<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reservation;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function create(Request $request, Shop $shop)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'mode' => 'payment',
            'line_items' => [[
                'price_data' => [
                    'currency' => 'jpy',
                    'unit_amount' => $shop->price,
                    'product_data' => [
                        'name' => $shop->name . ' 予約料金',
                    ],
                ],
                'quantity' => 1,
            ]],
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}&shop_id=' . $shop->id,
            'cancel_url' => route('payment.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $sessionId = $request->session_id;
        $shopId = $request->shop_id;

        $session = Session::retrieve($sessionId);
        $paymentIntentId = $session->payment_intent;

        // 予約を作成
        $reservation = Reservation::create([
            'user_id' => auth()->id(),
            'shop_id' => $shopId,
            'reserved_at' => now(),
            'date' => now()->toDateString(),        // ← 追加
            'time' => now()->format('H:i:s'),       // ← 追加
            'number_of_people' => 1,                // ← 追加
            'payment_status' => 'paid',
            'payment_intent_id' => $paymentIntentId,
            'price_at_booking' => $session->amount_total,
        ]);

        return view('payment.success', compact('reservation'));
    }

    public function cancel()
    {
        return view('payment.cancel');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reservation;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function create(Request $request, Reservation $reservation)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'mode' => 'payment',
            'line_items' => [[
                'price_data' => [
                    'currency' => 'jpy',
                    'unit_amount' => $reservation->shop->price,
                    'product_data' => [
                        'name' => $reservation->shop->name . ' 予約料金',
                    ],
                ],
                'quantity' => 1,
            ]],
            'success_url' => route('payment.success')
                . '?session_id={CHECKOUT_SESSION_ID}&reservation_id=' . $reservation->id,
            'cancel_url' => route('payment.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $sessionId = $request->session_id;
        $reservationId = $request->reservation_id;

        // 既存予約を取得
        $reservation = Reservation::findOrFail($reservationId);
        $session = \Stripe\Checkout\Session::retrieve($request->session_id);

        $reservation->update([
            'payment_status' => 'paid',
            'payment_intent_id' => $session->payment_intent_id,
        ]);

        return view('payment.success', compact('reservation'));

    }

    public function cancel()
    {
        return view('payment.cancel');
    }
}

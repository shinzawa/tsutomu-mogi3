<?php

namespace App\Http\Controllers\User;

use App\Models\Shop;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{

    public function create(ReservationRequest $request)
    {
        $reserve = new Reservation();
        $reserve->user_id = auth()->id();
        $reserve->shop_id = $request->input('shop_id');
        $reserve->date = $request->input('date');
        $reserve->time = $request->input('time');
        $reserve->number_of_people = $request->input('number_of_people');
        $reserve->save();

        return redirect()->route('user.reservations.done');
    }

    public function done()
    {
        return view('user.reservations.done');
    }

    public function update(ReservationRequest $request, $reservation_id)
    {
        $reservation = Reservation::find($reservation_id);
        $reservation->update($request->all());

        return redirect()->route('user.reservations.done');
    }

    public function cancel($reservation_id)
    {
        $reservation = Reservation::findOrFail($reservation_id);

        // 不正アクセス防止
        if ($reservation->user_id !== auth()->id()) {
            abort(403);
        }

        $reservation->delete();

        return redirect()->route('user.reservations.index')->with('success', '予約をキャンセルしました');
    }

    public function index()
    {
        $query = Shop::query();
        $query->whereIn('id', function ($query) {
            $query->select('shop_id')
                ->from('likes')
                ->where('user_id', auth()->id());
        });
        $shops = $query->get();
        $favoriteShopIds = $shops->pluck('id')->toArray();

        $reservations = Reservation::with('shop')
            ->where('user_id', auth()->id())
            ->get();
        $user = auth()->user();
        return view('user.reservations.index', compact(['user', 'shops', 'reservations', 'favoriteShopIds']));
    }

    // 予約詳細（QRコード表示）
    public function show(Reservation $reservation)
    {
        // 不正アクセス防止
        if ($reservation->user_id !== Auth::id()) {
            abort(403);
        }

        return view('user.reservations.show', compact('reservation'));
    }
}

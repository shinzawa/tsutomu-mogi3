<?php

namespace App\Http\Controllers\User;

use App\Models\Shop;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
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

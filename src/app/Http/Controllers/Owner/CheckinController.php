<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    // 店舗側のQR読み取り画面
    public function scan()
    {
        return view('owner.checkin.scan');
    }

    // QRコードの token を受け取り照合
    public function verify(Request $request)
    {
        $request->validate([
            'token' => 'required|string'
        ]);

        $reservation = Reservation::where('checkin_token', $request->token)->first();

        if (!$reservation) {
            return back()->with('error', '無効なQRコードです');
        }

        if ($reservation->checked_in_at) {
            return back()->with('error', 'すでにチェックイン済みです');
        }

        // チェックイン処理
        $reservation->checked_in_at = now();
        $reservation->save();

        return back()->with('success', 'チェックイン完了しました');
    }
}

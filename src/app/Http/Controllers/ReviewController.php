<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Reservation $reservation)
    {
        $this->authorize('review', $reservation);

        if ($reservation->review) {
            abort(403, 'この予約はすでに評価済みです');
        }

        return view('review.create', compact('reservation'));
    }

    public function store(Request $request, Reservation $reservation)
    {
        $this->authorize('review', $reservation);

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        Review::create([
            'reservation_id' => $reservation->id,
            'user_id'        => auth()->id(),
            'shop_id'        => $reservation->shop_id,
            'rating'         => $request->rating,
            'comment'        => $request->comment,
        ]);

        return redirect()->route('mypage.reservations')
            ->with('success', '評価を送信しました');
    }
}

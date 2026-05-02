<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Mail\ReservationNoticeMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerReservationController extends Controller
{
    public function index()
    {
        $shop = Auth::user()->shop;

        $reservations = $shop->reservations()->with('user')->get();

        return view('owner.reservations.index', compact('reservations'));
    }

    public function notifyForm(Reservation $reservation)
    {
        $this->authorize('view', $reservation);

        return view('owner.reservations.notify', [
            'reservation' => $reservation,
            'user' => $reservation->user,
        ]);
    }

    public function sendNotify(Request $request, Reservation $reservation)
    {
        $this->authorize('update', $reservation);

        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::to($reservation->user->email)
            ->send(new ReservationNoticeMail(
                $request->subject,
                $request->message,
                $reservation
            ));

        return redirect()
            ->route('owner.reservations.index')
            ->with('success', 'お知らせメールを送信しました');
    }
}

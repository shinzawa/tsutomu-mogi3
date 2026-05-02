<?php

namespace App\Mail;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    /**
     * Create a new message instance.
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('本日のご予約のご案内')
            ->view('emails.reservation_reminder')
            ->with([
                'reservation' => $this->reservation,
                'user'        => $this->reservation->user,
                'shop'        => $this->reservation->shop,
            ]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reservation;

class ReservationNoticeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectText;
    public $messageText;
    public $reservation;

    /**
     * コンストラクタで必要な情報を受け取る
     */
    public function __construct(string $subjectText, string $messageText, Reservation $reservation)
    {
        $this->subjectText = $subjectText;
        $this->messageText = $messageText;
        $this->reservation = $reservation;
    }

    /**
     * メールの内容を組み立てる
     */
    public function build()
    {
        return $this->subject($this->subjectText)
            ->view('emails.reservation_notice')
            ->with([
                'messageText' => $this->messageText,
                'reservation' => $this->reservation,
            ]);
    }
}

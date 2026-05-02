<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationReminderMail;
use Carbon\Carbon;

class SendReservationReminder extends Command
{
    /**
     * コマンド名（artisan で使う名前）
     */
    protected $signature = 'reservation:reminder';

    /**
     * 説明（php artisan list に表示される）
     */
    protected $description = '予約当日のユーザーにリマインダーメールを送信する';

    /**
     * コマンドのメイン処理
     */
    public function handle()
    {
        $today = Carbon::today()->toDateString();

        // 今日の予約を取得
        $reservations = Reservation::whereDate('date', $today)->get();

        if ($reservations->isEmpty()) {
            $this->info('本日の予約はありません。');
            return Command::SUCCESS;
        }

        foreach ($reservations as $reservation) {

            // ユーザーへメール送信
            Mail::to($reservation->user->email)
                ->send(new ReservationReminderMail($reservation));

            $this->info("送信完了: {$reservation->user->email}");
        }

        return Command::SUCCESS;
    }
}

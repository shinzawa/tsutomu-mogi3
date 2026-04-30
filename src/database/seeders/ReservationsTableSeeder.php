<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Reservation::factory()->count(10)->create();
          $param = [
            'user_id' => 1,
            'shop_id' => 1,
            'date' => '2026-06-01 17:00:00',
            'time' => '17:00:00',
            'number_of_people' => 1,
          ];
          Reservation::create($param);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Review::factory()->count(10)->create();
          $param = [
            'reservation_id' => 1,
            'user_id' => 1,
            'shop_id' => 1,
            'rating' => 5,
            'comment' => 'とても美味しかったです！',
          ];
          Review::create($param);
    }
}

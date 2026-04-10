<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Like::factory()->count(10)->create();
        $param = [
            'user_id' => 1,
            'shop_id' => 1,
        ];
        Like::create($param);

        $param = [
            'user_id' => 1,
            'shop_id' => 2,
        ];
        Like::create($param);
    }
}

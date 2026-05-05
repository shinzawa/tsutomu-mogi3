<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ShopFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'area' => $this->faker->randomElement(['東京都', '大阪府', '福岡県']),
            'genre' => $this->faker->randomElement(['寿司', '焼肉', 'イタリアン', 'カフェ']),
            'description' => $this->faker->sentence(10),
            'img_url' => 'public/img/default.jpg',

            // 店舗ごとに料金が違う（1000〜10000円）
            'price' => $this->faker->numberBetween(1000, 10000),

            // 店舗オーナー（User）を自動生成
            'shop_owner_id' => User::factory(),
        ];
    }
}

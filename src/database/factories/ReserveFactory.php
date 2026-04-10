<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReserveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 2),
            'shop_id' => $this->faker->numberBetween(1, 10),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'number_of_people' => $this->faker->numberBetween(1, 10),
        ];
    }
}

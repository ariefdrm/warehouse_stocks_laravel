<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stocks>
 */
class StocksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'items_id' => $this->faker->numberBetween(1, 10),
            'warehouse_id' => $this->faker->numberBetween(1, 10),
            'quantiry' => $this->faker->randomNumber()
        ];
    }
}

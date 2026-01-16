<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StocksTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = ['IN', 'OUT'];


        return [
            //
            'item_id' => $this->faker->numberBetween(1, 10),
            'warehouse_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10),
            'type' => $this->faker->randomElements($type),
            'quantiry' => $this->faker->randomNumber(),
            'note' => $this->faker->paragraph(),
            'transaction_date' => $this->faker->date()
        ];
    }
}

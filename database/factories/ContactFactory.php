<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'staff_id' => User::where('is_staff', true)->random()->id,
            'data' =>  json_encode(['areas' => ['full', 'city']]),
            'longitude' => fake()->randomFloat(),
            'latitude' => fake()->randomFloat(),
            'type' => $this->faker->word(),
        ];
    }
}

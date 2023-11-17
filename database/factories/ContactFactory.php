<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;

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
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            // 'staff_id' => User::where('is_staff', true)->inRandomOrder()->id,
            'text' =>  fake()->text(50),
            'priority' => fake()->word(),
            'created_at' => fake()->dateTimeBetween(Carbon::now()->subDays(7), Carbon::now())
        ];
    }
}

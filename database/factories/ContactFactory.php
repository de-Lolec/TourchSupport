<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
use App\Models\Priority;
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
            'name' => fake()->name(),
            'phone' => rand(1,100000),
            'email' => fake()->unique()->safeEmail(),
            'category_id' => Category::inRandomOrder()->first()->id,
            // 'staff_id' => User::where('is_staff', true)->inRandomOrder()->id,
            'text' => fake()->text(50),
            'priority_id' => Priority::inRandomOrder()->first()->id,
            'created_at' => fake()->dateTimeBetween(Carbon::now()->subDays(1), Carbon::now())
        ];
    }
}

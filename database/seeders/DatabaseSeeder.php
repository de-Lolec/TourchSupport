<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\CategorySeeder;
use Database\Seeders\SpecializationSeeder;
use Database\Seeders\UserSpecializationSeeder;
use Database\Seeders\PrioritySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PrioritySeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(UserSpecializationSeeder::class);
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Contact::factory(100)->create();
        

        // \App\Models\Category::factory()->create([
        //     'name' => 'Test User',
        // ]);

       
    }
}

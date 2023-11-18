<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            [
                'name' => 'high_priority',
            ],
            [
                'name' => 'standard_priority',
            ],
            [
                'name' => 'medium_priority',
            ],

        ];

        foreach ($records as $record) {
            DB::table('priorities')->insert($record);
        }
    }
    
}

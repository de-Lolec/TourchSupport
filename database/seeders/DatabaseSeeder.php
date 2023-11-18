<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $records = [
            [
                'name' => 'change_order',
            ],
            [
                'name' => 'delete_account',
            ],
            [
                'name' => 'get_invoice',
            ],
            [
                'name' => 'track_order',
            ],
            [
                'name' => 'set_up_shipping_address',
            ],
            [
                'name' => 'payment_issue',
            ],
            [
                'name' => 'switch_account',
            ],
            [
                'name' => 'delivery_period',
            ],
            [
                'name' => 'create_account',
            ],
            [
                'name' => 'complaint',
            ],
            [
                'name' => 'contact_customer_service',
            ],
            [
                'name' => 'recover_password',
            ],
            [
                'name' => 'delivery_options',
            ],
            [
                'name' => 'contact_human_agent',
            ],
            [
                'name' => 'check_invoice',
            ],
            [
                'name' => 'check_refund_policy',
            ],
            [
                'name' => 'check_invoices',
            ],
            [
                'name' => 'newsletter_subscription',
            ],
            [
                'name' => 'edit_account',
            ],
            [
                'name' => 'check_cancellation_fee',
            ],
            [
                'name' => 'check_payment_methods',
            ],
            [
                'name' => 'track_refund',
            ],
            [
                'name' => 'review',
            ],
            [
                'name' => 'change_shipping_address',
            ],
            [
                'name' => 'registration_problems',
            ],
            [
                'name' => 'place_order',
            ],
            [
                'name' => 'cancel_order',
            ],

        ];

        foreach ($records as $record) {
            DB::table('categories')->insert($record);
        }

        // \App\Models\User::factory(10)->create();
        // \App\Models\Category::factory(10)->create();
        \App\Models\Contact::factory(100)->create();
        

        // \App\Models\Category::factory()->create([
        //     'name' => 'Test User',
        // ]);

       
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            [
                'name' => 'is_competent_in_payment_issue',
            ],
            [
                'name' => 'is_competent_in_create_account',
            ],
            [
                'name' => 'is_competent_in_contact_customer_service',
            ],
            [
                'name' => 'is_competent_in_get_invoice',
            ],
            [
                'name' => 'is_competent_in_track_order',
            ],
            [
                'name' => 'is_competent_in_get_refund',
            ],
            [
                'name' => 'is_competent_in_contact_human_agent',
            ],
            [
                'name' => 'is_competent_in_recover_password',
            ],
            [
                'name' => 'is_competent_in_change_order',
            ],
            [
                'name' => 'is_competent_in_delete_account',
            ],
            [
                'name' => 'is_competent_in_complaint',
            ],
            [
                'name' => 'is_competent_in_check_invoices',
            ],
            [
                'name' => 'is_competent_in_review',
            ],
            [
                'name' => 'is_competent_in_check_refund_policy',
            ],
            [
                'name' => 'is_competent_in_delivery_options',
            ],
            [
                'name' => 'is_competent_in_check_cancellation_fee',
            ],
            [
                'name' => 'is_competent_in_track_refund',
            ],
            [
                'name' => 'is_competent_in_check_payment_methods',
            ],
            [
                'name' => 'is_competent_in_switch_account',
            ],
            [
                'name' => 'is_competent_in_newsletter_subscription',
            ],
            [
                'name' => 'is_competent_in_delivery_period',
            ],
            [
                'name' => 'is_competent_in_edit_account',
            ],
            [
                'name' => 'is_competent_in_registration_problems',
            ],
            [
                'name' => 'is_competent_in_change_shipping_address',
            ],
            [
                'name' => 'is_competent_in_set_up_shipping_address',
            ],
            [
                'name' => 'is_competent_in_place_order',
            ],
            [
                'name' => 'is_competent_in_cancel_order',
            ],
            [
                'name' => 'is_competent_in_check_invoice',
            ],
        ];

        foreach ($records as $record) {
            DB::table('specializations')->insert($record);
        }
        
    }
}

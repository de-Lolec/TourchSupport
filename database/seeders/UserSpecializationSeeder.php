<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserSpecialization;
use App\Models\Specialization;

class UserSpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employeesData = [
            [
                'name' => 'Joshua Mummert',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                    'is_competent_in_get_refund',
                    'is_competent_in_contact_human_agent',
                    'is_competent_in_recover_password',
                    'is_competent_in_change_order',
                    'is_competent_in_delete_account',
                    'is_competent_in_complaint',
                    'is_competent_in_check_invoices',
                    'is_competent_in_review',
                    'is_competent_in_check_refund_policy',
                    'is_competent_in_delivery_options',
                    'is_competent_in_check_cancellation_fee',
                    'is_competent_in_track_refund',
                    'is_competent_in_check_payment_methods',
                    'is_competent_in_switch_account',
                    'is_competent_in_newsletter_subscription',
                    'is_competent_in_delivery_period',
                    'is_competent_in_edit_account',
                    'is_competent_in_registration_problems',
                    'is_competent_in_change_shipping_address',
                    'is_competent_in_set_up_shipping_address',
                    'is_competent_in_place_order',
                    'is_competent_in_cancel_order',
                    'is_competent_in_check_invoice',
                ],
            ],
            [
                'name' => 'Allan Pearson',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                    'is_competent_in_get_refund',
                    'is_competent_in_contact_human_agent',
                    'is_competent_in_recover_password',
                    'is_competent_in_change_order',
                    'is_competent_in_delete_account',
                    'is_competent_in_complaint',
                    'is_competent_in_check_invoices',
                    'is_competent_in_review',
                    'is_competent_in_check_refund_policy',
                    'is_competent_in_delivery_options',
                    'is_competent_in_check_cancellation_fee',
                    'is_competent_in_track_refund',
                    'is_competent_in_check_payment_methods',
                    'is_competent_in_switch_account',
                    'is_competent_in_newsletter_subscription',
                    'is_competent_in_delivery_period',
                    'is_competent_in_edit_account',
                    'is_competent_in_registration_problems',
                    'is_competent_in_change_shipping_address',
                    'is_competent_in_set_up_shipping_address',
                    'is_competent_in_place_order',
                    'is_competent_in_cancel_order',
                    'is_competent_in_check_invoice',
                ],
            ],
            [
                'name' => 'Victoria Butler',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                    'is_competent_in_get_refund',
                    'is_competent_in_contact_human_agent',
                    'is_competent_in_recover_password',
                    'is_competent_in_change_order',
                    'is_competent_in_delete_account',
                    'is_competent_in_complaint',
                    'is_competent_in_check_invoices',
                    'is_competent_in_review',
                    'is_competent_in_check_refund_policy',
                    'is_competent_in_delivery_options',
                    'is_competent_in_check_cancellation_fee',
                    'is_competent_in_track_refund',
                    'is_competent_in_check_payment_methods',
                    'is_competent_in_switch_account',
                    'is_competent_in_newsletter_subscription',
                    'is_competent_in_delivery_period',
                    'is_competent_in_edit_account',
                    'is_competent_in_registration_problems',
                    'is_competent_in_change_shipping_address',
                    'is_competent_in_set_up_shipping_address',
                    'is_competent_in_place_order',
                    'is_competent_in_cancel_order',
                    'is_competent_in_check_invoice',
                ],
            ],
            [
                'name' => 'Harold Manalang',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                    'is_competent_in_get_refund',
                    'is_competent_in_contact_human_agent',
                    'is_competent_in_recover_password',
                    'is_competent_in_change_order',
                    'is_competent_in_delete_account',
                    'is_competent_in_complaint',
                    'is_competent_in_check_invoices',
                    'is_competent_in_review',
                    'is_competent_in_check_refund_policy',
                    'is_competent_in_delivery_options',
                    'is_competent_in_check_cancellation_fee',
                    'is_competent_in_track_refund',
                    'is_competent_in_check_payment_methods',
                    'is_competent_in_switch_account',
                    'is_competent_in_newsletter_subscription',
                    'is_competent_in_delivery_period',
                    'is_competent_in_edit_account',
                ],
            ],
            [
                'name' => 'Valeria Sanders',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                    'is_competent_in_get_refund',
                    'is_competent_in_contact_human_agent',
                    'is_competent_in_recover_password',
                    'is_competent_in_change_order',
                    'is_competent_in_delete_account',
                    'is_competent_in_complaint',
                    'is_competent_in_check_invoices',
                    'is_competent_in_review',
                    'is_competent_in_check_refund_policy',
                    'is_competent_in_delivery_options',
                ],
            ],
            [
                'name' => 'Lissa Johnson',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                    'is_competent_in_get_refund',
                    'is_competent_in_contact_human_agent',
                    'is_competent_in_recover_password',
                    'is_competent_in_change_order',
                    'is_competent_in_delete_account',
                    'is_competent_in_complaint',
                    'is_competent_in_check_invoices',
                    'is_competent_in_review',
                    'is_competent_in_check_refund_policy',
                    'is_competent_in_delivery_options',
                ],
            ],
            [
                'name' => 'Loretta Humphries',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                    'is_competent_in_get_refund',
                    'is_competent_in_contact_human_agent',
                    'is_competent_in_recover_password',
                    'is_competent_in_change_order',
                    'is_competent_in_delete_account',
                    'is_competent_in_complaint',
                    'is_competent_in_check_invoices',
                    'is_competent_in_review',
                    'is_competent_in_check_refund_policy',
                    'is_competent_in_delivery_options',
                ],
            ],
            [
                'name' => 'Leo Garrett',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                    'is_competent_in_get_refund',
                    'is_competent_in_contact_human_agent',
                    'is_competent_in_recover_password',
                    'is_competent_in_change_order',
                    'is_competent_in_delete_account',
                    'is_competent_in_complaint',
                    'is_competent_in_check_invoices',
                    'is_competent_in_review',
                    'is_competent_in_check_refund_policy',
                    'is_competent_in_delivery_options',
                ],
            ],
            [
                'name' => 'Geraldine Montoya',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                    'is_competent_in_get_refund',
                    'is_competent_in_contact_human_agent',
                    'is_competent_in_recover_password',
                    'is_competent_in_change_order',
                    'is_competent_in_delete_account',
                    'is_competent_in_complaint',
                    'is_competent_in_check_invoices',
                    'is_competent_in_review',
                    'is_competent_in_check_refund_policy',
                    'is_competent_in_delivery_options',
                ],
            ],
            [
                'name' => 'Noemi Dye',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                ],
            ],
            [
                'name' => 'Mary Parker',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                ],
            ],
            [
                'name' => 'James Kemp',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                ],
            ],
            [
                'name' => 'Gladys Sutton',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                ],
            ],
            [
                'name' => 'David Briggs',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                ],
            ],
            [
                'name' => 'Jessica Gajewski',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                ],
            ],
            [
                'name' => 'Grace Dinardo',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                ],
            ],
            [
                'name' => 'Charles Hulslander',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                ],
            ],
            [
                'name' => 'Amy Manning',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                ],
            ],
            [
                'name' => 'Pat Miles',
                'specializations' => [
                    'is_competent_in_payment_issue',
                    'is_competent_in_create_account',
                    'is_competent_in_contact_customer_service',
                    'is_competent_in_get_invoice',
                    'is_competent_in_track_order',
                ],
            ],
        ];

        foreach ($employeesData as $employeeData) {
            // Генерация временного пароля
            $tempPassword = Str::random(8); // Генерация случайной строки, можно заменить на любую другую логику для временного пароля

            // Создаем пользователя с тестовым email'ом и временным паролем
            $user = new User([
                'name' => $employeeData['name'],
                'email' => strtolower(str_replace(' ', '', $employeeData['name'])) . '@example.com',
                'password' => Hash::make($tempPassword), // Хеширование временного пароля
            ]);
            $user->save();

            // Получаем ID специализаций по их названиям
            $specializationIds = Specialization::whereIn('name', $employeeData['specializations'])
                ->pluck('id')
                ->toArray();

            // Присоединяем специализации к пользователю
            $user->specializations()->attach($specializationIds);
        }
    }
}
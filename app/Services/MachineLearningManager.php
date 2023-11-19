<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Services\MachineLearningManager;
use App\Models\User;
use App\Models\Contact;

class MachineLearningManager
{
    public function getImportancyAndPriority(string $text, $contact): void
    {
        
        $response = Http::withBody('tell me if my package is out for delivery')->post('http://79.174.95.30:8080/predict');
    
        
        dd($response);
        $priority = 'standard_priority';
        $category = 'create_account';

        $competencies = [
            'change_order' => ['is_competent_in_change_order'],
            'delete_account' => ['is_competent_in_delete_account'],
            'get_invoice' => ['is_competent_in_get_invoice', 'is_competent_in_check_invoices', 'is_competent_in_check_invoice'],
            'track_order' => ['is_competent_in_track_order'],
            'set_up_shipping_address' => ['is_competent_in_set_up_shipping_address'],
            'payment_issue' => ['is_competent_in_payment_issue', 'is_competent_in_check_payment_methods'],
            'switch_account' => ['is_competent_in_switch_account'],
            'delivery_period' => ['is_competent_in_delivery_period'],
            'create_account' => ['is_competent_in_create_account'],
            'complaint' => ['is_competent_in_complaint'],
            'contact_customer_service' => ['is_competent_in_contact_customer_service', 'is_competent_in_contact_human_agent'],
            'get_refund' => ['is_competent_in_get_refund', 'is_competent_in_track_refund'],
            'recover_password' => ['is_competent_in_recover_password'],
            'delivery_options' => ['is_competent_in_delivery_options'],
            'check_refund_policy' => ['is_competent_in_check_refund_policy'],
            'newsletter_subscription' => ['is_competent_in_newsletter_subscription'],
            'edit_account' => ['is_competent_in_edit_account'],
            'check_cancellation_fee' => ['is_competent_in_check_cancellation_fee'],
            'registration_problems' => ['is_competent_in_registration_problems'],
            'place_order' => ['is_competent_in_place_order'],
            'cancel_order' => ['is_competent_in_cancel_order'],
        ];
        

        $requiredCompetencies = $competencies[$category];
    
        $responsibleStaff = User::where('is_staff', true)
        ->whereHas('specializations', function ($query) use ($requiredCompetencies) {
            $query->whereIn('name', $requiredCompetencies);
        })
        ->pluck('id');
        
        $staffWithContactCount = User::whereIn('users.id', $responsibleStaff)
            ->leftJoin('contacts', 'users.id', '=', 'contacts.staff_id')
            ->where(function ($query) {
                $query->where('contacts.is_close', false)
                    ->orWhereNull('contacts.is_close');
            })
            ->groupBy('users.id')
            ->selectRaw('users.id, COUNT(contacts.id) as count')
            ->pluck('count', 'users.id')
            ->toArray();
        
        // Находим самое маленькое значение в массиве
        $minValue = min($staffWithContactCount);

        // Получаем ключ(и) элемента(ов) с минимальным значением
        $keysWithMinValue = array_keys($staffWithContactCount, $minValue);

        // Если нужно только первый ключ с минимальным значением
        $firstKeyWithMinValue = $keysWithMinValue[0];

        $contact->staff_id = $firstKeyWithMinValue;
        $contact->priority = $priority;

        $contact->save();

        // dd($firstKeyWithMinValue);
    
        // if ($responsibleStaff) {
        //     // Возвращаем ответственного сотрудника
        //     return $responsibleStaff;
        // }
        
    }

}
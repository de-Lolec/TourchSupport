<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class PopularCategoriesPerMouth extends ChartWidget
{
    protected static ?string $heading = 'Самые популярные категории за месяц';

    protected static ?int $sort = 2;

    protected static string $color = 'info';

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getData(): array
    {

        $results = [];
        $startTime = Carbon::now()->startOfDay();

        for ($i = 0; $i < 12; $i++) { // 12 интервалов по 2 часа в день
            $endTime = $startTime->copy()->addHours(2);
            $count = DB::table('contacts')
                ->whereBetween('created_at', [$startTime, $endTime])
                ->count();
            $results[] = $count;
            $startTime = $endTime;
        }

        $intervals = [];

        $startDate = Carbon::now()->startOfDay();
    
        $contacts = new Contact;

        $contactPerMouth = $contacts->CountContactsPerMouth(8);
        
        for ($i = 0; $i < 12; $i++) {
            $intervals[] = $startDate->format('H:i');
            $startDate->addHours(2);
        }

        return [
            'datasets' => [
                [
                    'data' => $contactPerMouth['counts'],
                    'backgroundColor' => [
                        '#ADFF2F',
                        '#32CD32',
                        '#00FF7F',
                        '#9400D3',
                        '#FF69B4',
                        '#008000',
                        '#66CDAA',
                        '#00FFFF',
                    ],
                ],
            ],
            'labels' => $contactPerMouth['categoryNames']
        ];
    }
}

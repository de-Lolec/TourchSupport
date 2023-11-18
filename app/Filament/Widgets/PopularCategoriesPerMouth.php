<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class PopularCategoriesPerMouth extends ChartWidget
{
    protected static ?string $heading = 'Количество обращений за день';

    protected static ?int $sort = 1;

    protected function getType(): string
    {
        return 'line';
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
    
        for ($i = 0; $i < 12; $i++) {
            $intervals[] = $startDate->format('H:i');
            $startDate->addHours(2);
        }

        return [
            'datasets' => [
                [
                    'type' => 'doughnut',
                    'label' => 'Orders',
                    'data' => $results,
                    'fill' => 'start',
                ],
            ],
            'labels' => $intervals,
        ];
    }
}

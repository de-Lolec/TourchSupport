<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class CountContactsDay extends ChartWidget
{
    protected static ?string $heading = 'Количество обращений за день';

    protected static ?int $sort = 1;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Orders',
                    'data' => self::getCountContacts(),
                    'fill' => 'start',
                ],
            ],
            'labels' => self::getIntervals(),
        ];
    }

    private function getCountContacts(): array
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

        return $results;
    }

    private function getIntervals(): array
    {
        $intervals = [];

        $startDate = Carbon::now()->startOfDay();
    
        for ($i = 0; $i < 12; $i++) {
            $intervals[] = $startDate->format('H:i');
            $startDate->addHours(2);
        }

        return $intervals;
    }
}

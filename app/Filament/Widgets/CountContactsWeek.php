<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class CountContactsWeek extends ChartWidget
{
    protected static ?string $heading = 'Количество обращений за 7 дней';

    protected static ?int $sort = 3;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Заявки',
                    'data' => self::getCountConctactWeek(),
                    'fill' => 'start',
                ],
            ],
            'labels' => self::getDaysOfWeek(),
        ];
    }

    private function getCountConctactWeek(): array
    {
        $currentDate = Carbon::now();

        $recordsPerDay = [];

        for ($day = 0; $day < 7; $day++) {

            $startOfDay = $currentDate->copy()->startOfDay()->subDays($day);
            $endOfDay = $currentDate->copy()->endOfDay()->subDays($day);
        
            $recordsCount = Contact::whereBetween('created_at', [$startOfDay, $endOfDay])->count();
        
            $recordsPerDay[] = $recordsCount;
        }

        return $recordsPerDay;
    }

    private function getDaysOfWeek(): array
    {
        $daysOfWeek = [];

        $startDate = Carbon::now();
    
        $startDate->subDays(7);

        for ($i = 0; $i < 7; $i++) {
            $daysOfWeek[] = $startDate->format('d.m');
            $startDate->addDay();
        }

        return $daysOfWeek;
    }
}

<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class OrdersChart extends ChartWidget
{
    protected static ?string $heading = 'Количество обращений за 7 дней';

    protected static ?int $sort = 1;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {

        $currentDate = Carbon::now();

        // Создаем массив для хранения количества записей в каждый день недели
        $recordsPerDay = [];

        for ($day = 0; $day < 7; $day++) {
            // Получаем начало и конец текущего дня
            $startOfDay = $currentDate->copy()->startOfDay()->subDays($day);
            $endOfDay = $currentDate->copy()->endOfDay()->subDays($day);
        
            // Получаем количество записей за текущий день
            $recordsCount = Contact::whereBetween('created_at', [$startOfDay, $endOfDay])->count();
        
            // Добавляем количество записей в массив
            $recordsPerDay[] = $recordsCount;
        }
        $daysOfWeek = [];

        // Получаем текущую дату
        $startDate = Carbon::now();
    
        // Вычитаем 7 дней
        $startDate->subDays(7);
    
        // Заполняем массив с датами за последние 7 дней в формате "день.месяц"
        for ($i = 0; $i < 7; $i++) {
            $daysOfWeek[] = $startDate->format('d.m');
            $startDate->addDay();
        }
    
        // dd($daysOfWeek);

        // dd($recordsPerDay);

        return [
            'datasets' => [
                [
                    'label' => 'Orders',
                    'data' => $recordsPerDay,
                    'fill' => 'start',
                ],
            ],
            'labels' => $daysOfWeek,
        ];
    }
}

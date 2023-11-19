<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Contact;
use Carbon\Carbon;
use Filament\Actions\ViewAction;
use Illuminate\Support\Facades\DB;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        return [
            Stat::make('Количество обращений за час', Contact::where('created_at', '>=', Carbon::now()->subHour())->count())
            ->chart(self::getCountContactPerHourChart())
            ->color('success'),
            Stat::make('Количество обработанных заявок', self::getPercentageContcat() . "%"),
            Stat::make('Среднее время ответа', '3:12'),
        ];  
    }

    protected function getPercentageContcat(): float
    {
        $totalContacts = Contact::count();
        $nonEmptyStaffIdContacts = Contact::whereNotNull('staff_id')->count();

        if ($totalContacts > 0) {
            $percentage = ($nonEmptyStaffIdContacts / $totalContacts) * 100;
            return round($percentage);
        } else {
            return 0;
        }
    }

    protected function getCountContactPerHourChart(): array
    {
        $results = [];
        $startTime = Carbon::now()->subHour();

        for ($i = 0; $i < 5; $i++) { // 5 интервалов по 12 минут в течение часа
            $endTime = $startTime->copy()->addMinutes(12);
            $count = DB::table('contacts')
                ->whereBetween('created_at', [$startTime, $endTime])
                ->count();
            $results[] = $count;
            $startTime = $endTime;
        }

        return $results;
    }
}

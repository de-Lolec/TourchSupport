<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class CountContactStaff extends ChartWidget
{
    protected static ?string $heading = 'Количество обработнных сообщений сотрудниками';

    protected static ?int $sort = 4;

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getData(): array
    {
        $topUsers = self::getTopUsers();

        $counts = $totalContacts = $topUsers->pluck('total_contacts')->toArray(); 

        $userIds = $topUsers->pluck('staff_id')->toArray();

        $userNames = DB::table('users')
        ->whereIn('id', $userIds)
        ->pluck('name')
        ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Заявки',
                    'data' => $counts,
                    'fill' => 'start',
                ],
            ],
            'labels' => $userNames,
        ];
    }

    protected function getTopUsers(): Collection
    {
        $currentDate = Carbon::now();

        $startDate = $currentDate->startOfWeek()->toDateString();

        $endDate = $currentDate->endOfWeek()->toDateString();

        $users = DB::table('users')
            ->where('is_staff', true)
            ->pluck('id');

        $topUsers = DB::table('contacts')
            ->select('staff_id', DB::raw('COUNT(*) as total_contacts'))
            ->whereIn('staff_id', $users)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('staff_id')
            ->orderByDesc('total_contacts')
            ->take(10)
            ->get();

        return $topUsers;
    }
}

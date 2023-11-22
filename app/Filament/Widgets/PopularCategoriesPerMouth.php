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
        $contactPerMouth = self::CountContactsPerMouth(8);

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

    private function CountContactsPerMouth(int $countRecords): array
    {
        $categoryCounts = Contact::select('categories.name as category_name', DB::raw('COUNT(*) as count'))
            ->join('categories', 'contacts.category_id', '=', 'categories.id')
            ->whereMonth('contacts.created_at', now()->month)
            ->groupBy('contacts.category_id', 'categories.name')
            ->orderByDesc('count')
            ->take(8) 
            ->get();

        $categoryNames = [];
        $counts = [];

        foreach ($categoryCounts as $category) {
            $categoryNames[] = $category->category_name;
            $counts[] = $category->count;
        }

        return [
            'categoryNames' => $categoryNames,
            'counts' => $counts,
        ];
    }
}

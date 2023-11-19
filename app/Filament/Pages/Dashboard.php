<?php

namespace App\Filament\Pages;
use Filament\Panel;
 
use Filament\Pages\Dashboard as BasePage;
 
class Dashboard extends BasePage
{
    protected static ?string $title = 'Главная';

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->pages([])
            ->darkMode(false)
            ->path('');
    }

    public function getColumns(): int | string | array
    {
        return 2;
    }
}
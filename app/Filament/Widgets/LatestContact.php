<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use App\Models\Contact;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\Action;

final class LatestContact extends TableWidget
{
    protected static ?string $heading = 'Последние заявки';

    protected static ?int $sort = 5;

    protected static ?string $model = Contact::class;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn () => Contact::limit(10),
            )
            ->paginated(false)
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя'),
                Tables\Columns\TextColumn::make('text')
                    ->label('Текст обращения'),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Категория'),
                Tables\Columns\TextColumn::make('priority.name')
                    ->icon(fn (string $state): string => match ($state) {        
                        'high_priority' => 'heroicon-o-clock',
                        'medium_priority' => 'heroicon-o-clock',        
                        'standard_priority' => 'heroicon-o-clock',
                    })    
                    ->color(fn (string $state): string => match ($state) {
                        'high_priority' => 'danger',        
                        'medium_priority' => 'warning',
                        'standard_priority' => 'success',    
                    })
                    ->label('Приоритет'),
                ])
                ->defaultSort('created_at', 'desc')
                ->filters([
                    //
                ])
                ->actions([
                    ViewAction::make()
                    ->label('Смотреть')
                ->form([
                        TextInput::make('name'),
                        TextInput::make('email'),
                        TextInput::make('phone'),
                        TextInput::make('text'),
                    ])
                    ->modalWidth('2xl'),
                ])
                ->bulkActions([
                   
                ]);
    }
}

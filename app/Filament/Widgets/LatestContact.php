<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use App\Models\Contact;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\EditAction;

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
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('text'),
                Tables\Columns\TextColumn::make('category.name'),
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
                ])
                ->filters([
                    //
                ])
                ->actions([
                    Tables\Actions\ViewAction::make()
                    ->slideOver()
                    ->modalWidth('2xl')
                    ->extraModalFooterActions([
                    ]),
                ])
                ->bulkActions([
                   
                ]);
    }
}

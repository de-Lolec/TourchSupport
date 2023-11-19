<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\EditAction;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('phone'),
                RichEditor::make('text'),
                Section::make('Options')
                    ->description('Settings for options this ticket')
                    ->schema([
                        Select::make('priority')
                            ->options([
                                1 => 'high_priority',
                                2 => 'medium_priority',
                                3 => 'medium_priority',
                            ]),
                        Select::make('is_close')
                            ->options([
                                true => 'Yes',
                                false => 'No',
                            ]),
                    ])
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('text'),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->searchable(),
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
                    }),
                Tables\Columns\IconColumn::make('is_close')
                    ->boolean()
                    ->label('Is CLose'),
                // Tables\Columns\BadgeColumn::make('last_week_achievements_sum_points')
                //     ->label('Points')
                //     ->sum('lastWeekAchievements', 'points')
                //     ->sortable()
                //     ->formatStateUsing(fn (string $state): string => $state.' XP'),
                // Tables\Columns\TextColumn::make('lastWeekAchievements.title')
                //     ->label('Achievements')
                //     ->listWithLineBreaks()
                //     ->bulleted(),
            ])->defaultSort('id', 'desc')
            ->filters([
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_ticket')
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_ticket'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            );
                    })
            ])
            ->actions([
                EditAction::make()
                    ->form([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->modalWidth('2xl'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}

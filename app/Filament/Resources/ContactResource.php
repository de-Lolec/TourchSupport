<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use App\Models\Priority;
use App\Models\Category;
use App\Models\User;
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

    protected static ?string $navigationLabel = "Заявки";

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
                        Select::make('priority_id')
                            ->label('Приоритет')
                            ->options(Priority::all()->pluck('name', 'id'))
                            ->searchable(),
                        Select::make('category_id')
                            ->label('Категория')
                            ->options(Category::all()->pluck('name', 'id'))
                            ->searchable(),
                        Select::make('staff_id')
                            ->label('Сотрудник')
                            ->options(User::where('is_staff', true)->get()->pluck('name', 'id')->toArray())
                            ->searchable(),
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
                    ->searchable()
                    ->label('Имя'),
                Tables\Columns\TextColumn::make('text')
                    ->label('Текст обращения'),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Телефон')
                    ->searchable(),
                Tables\Columns\TextColumn::make('staff.name')
                    ->label('Назначено')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Категория')
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
                    })
                    ->label('Приоритет'),
                Tables\Columns\IconColumn::make('is_close')
                    ->boolean()
                    ->label('Закрыто'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_ticket')
                        ->label('Дата:')
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
                    ->modalWidth('2xl')
                    ->label('Изменить'),
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

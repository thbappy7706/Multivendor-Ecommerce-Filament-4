<?php

namespace App\Filament\Resources\Users\RelationManagers;

use Filament\Actions\ActionGroup;
use Filament\Actions\AttachAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AddressesRelationManager extends RelationManager
{
    protected static string $relationship = 'userAddresses';
    protected static ?string $recordTitleAttribute = 'address_line1';



    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('address_line1')
                    ->required()
                    ->label('Address Line 1')
                    ->maxLength(255),
                TextInput::make('address_line2')
                    ->label('Address Line 2')
                    ->maxLength(255),
                TextInput::make('city')
                    ->required()
                    ->maxLength(100),
                TextInput::make('state')
                    ->required()
                    ->maxLength(100),
                TextInput::make('country')
                    ->required()
                    ->maxLength(100),
                TextInput::make('postal_code')
                    ->required()
                    ->maxLength(20),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('address_line1')
                    ->label('Address Line 1')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('city')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('state')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('country')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('postal_code')
                    ->label('Postal Code')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                AttachAction::make(),
                CreateAction::make(),
            ])
            ->recordActions([
             ActionGroup::make([
                 EditAction::make(),
                 DetachAction::make(),
                 DeleteAction::make(),
             ])
            ])
            ->groupedBulkActions([
                DetachBulkAction::make(),
                DeleteBulkAction::make(),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Add New User')->icon('heroicon-s-user-plus'),
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('All'),
            'Super Admin' => Tab::make()->modifyQueryUsing(fn($query) => $query->whereHas('role', fn($q) => $q->where('name', 'Super Admin'))),
            'Admin' => Tab::make()->modifyQueryUsing(fn($query) => $query->whereHas('role', fn($q) => $q->where('name', 'Admin'))),
            'Vendor Manager' => Tab::make()->modifyQueryUsing(fn($query) => $query->whereHas('role', fn($q) => $q->where('name', 'Vendor Manager'))),
            'Vendor' => Tab::make()->modifyQueryUsing(fn($query) => $query->whereHas('role', fn($q) => $q->where('name', 'Vendor'))),
            'Customer Service' => Tab::make()->modifyQueryUsing(fn($query) => $query->whereHas('role', fn($q) => $q->where('name', 'Customer Service'))),
            'Content Manager' => Tab::make()->modifyQueryUsing(fn($query) => $query->whereHas('role', fn($q) => $q->where('name', 'Content Manager'))),
            'User' => Tab::make()->modifyQueryUsing(fn($query) => $query->whereHas('role', fn($q) => $q->where('name', 'User'))),
            'Guest' => Tab::make()->modifyQueryUsing(fn($query) => $query->whereHas('role', fn($q) => $q->where('name', 'Guest'))),
        ];
    }


}

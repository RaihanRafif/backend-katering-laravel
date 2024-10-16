<?php

namespace App\Filament\Resources\CateringSubscriptionResource\Pages;

use App\Filament\Resources\CateringSubscriptionResource;
use App\Filament\Resources\CateringSubscriptionResource\Widgets\CateringSubscriptionStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCateringSubscriptions extends ListRecords
{
    protected static string $resource = CateringSubscriptionResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            CateringSubscriptionStats::class
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

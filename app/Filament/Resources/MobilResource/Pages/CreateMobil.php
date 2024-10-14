<?php

namespace App\Filament\Resources\MobilResource\Pages;

use App\Filament\Resources\MobilResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMobil extends CreateRecord
{
    protected static string $resource = MobilResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

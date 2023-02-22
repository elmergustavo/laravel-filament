<?php

namespace App\Filament\Resources\ProductImagesResource\Pages;

use App\Filament\Resources\ProductImagesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductImages extends EditRecord
{
    protected static string $resource = ProductImagesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

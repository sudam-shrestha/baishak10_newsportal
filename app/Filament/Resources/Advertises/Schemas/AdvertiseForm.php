<?php

namespace App\Filament\Resources\Advertises\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AdvertiseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('company_name')
                    ->required(),
                TextInput::make('contact_no')
                    ->required(),
                    TextInput::make('redirect_url')
                        ->url()
                        ->required(),
                FileUpload::make('banner')
                    ->required(),
            ]);
    }
}

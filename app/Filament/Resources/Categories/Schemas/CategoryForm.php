<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Section::make('SEO')
                    ->columnSpanFull()
                    ->collapsed()
                    ->schema([
                        TextInput::make('meta_title')
                            ->default(null),
                        Textarea::make('meta_keywords')
                            ->default(null)
                            ->columnSpanFull(),
                        Textarea::make('meta_description')
                            ->default(null)
                            ->columnSpanFull(),
                    ])
            ]);
    }
}

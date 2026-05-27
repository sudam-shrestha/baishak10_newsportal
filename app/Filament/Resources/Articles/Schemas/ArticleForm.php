<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('General')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make("categories")
                            ->multiple()
                            ->required()
                            ->preload()
                            ->createOptionForm([
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
                            ])
                            ->relationship('categories', 'title'),
                        TextInput::make('writer')
                            ->required(),
                        TextInput::make('title')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->required(),
                        TextInput::make('slug')
                            ->required(),
                        RichEditor::make('content')
                            ->columnSpanFull()
                            ->required(),
                        FileUpload::make('image')
                            ->image()
                            ->required(),
                    ]),

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

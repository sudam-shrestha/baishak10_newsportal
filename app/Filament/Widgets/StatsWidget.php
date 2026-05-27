<?php

namespace App\Filament\Widgets;

use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Categories', Category::count())
                ->description('32k increase')
                ->color('success')
                ->url(route('filament.admin.resources.categories.index'))
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Total Articles', Article::count()),
            Stat::make('Total Advertises', Advertise::count()),
        ];
    }
}

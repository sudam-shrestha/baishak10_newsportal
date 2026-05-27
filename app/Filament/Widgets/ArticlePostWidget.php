<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ArticlePostWidget extends ChartWidget
{
    protected ?string $heading = 'Articles Posted Per Month';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        $articles = Article::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $data = [];
        $labels = [];

        for ($month = 1; $month <= 12; $month++) {
            $labels[] = date('M', mktime(0, 0, 0, $month, 1));
            $data[] = $articles[$month] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Articles Posted',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;

class PageController extends BaseController
{
    public function home()
    {
        $breaking_news = Article::where('status', true)->latest()->get();
        $latest_news = Article::where('status', true)->latest()->limit(2)->get();
        return view("frontend.home", compact("breaking_news", "latest_news"));
    }

    public function category()
    {
        return view('frontend.category');
    }
}

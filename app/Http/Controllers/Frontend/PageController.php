<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends BaseController
{
    public function home()
    {
        $breaking_news = Article::where('status', true)->latest()->get();
        $latest_news = Article::where('status', true)->latest()->limit(2)->get();
        return view("frontend.home", compact("breaking_news", "latest_news"));
    }

    public function category($slug)
    {
        $category = Category::where("slug", $slug)->first();
        $advertises = Advertise::where("status", true)->get();
        return view('frontend.category', compact('category', 'advertises'));
    }

    public function article($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $advertises = Advertise::where("status", true)->get();
        return view('frontend.article', compact('article', 'advertises'));
    }

    public function search(Request $request)
    {
        $search = $request->q;
        $articles = Article::where('title', "like", "%$search%")->get();
        $advertises = Advertise::where("status", true)->get();
        return view('frontend.search', compact('articles', 'advertises', 'search'));
    }
}

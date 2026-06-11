<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategoryResource;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function categories()
    {
        // return Auth::user();
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function category($slug)
    {
        $category = Category::where("slug", $slug)->first();
        return new CategoryResource($category);
    }

    public function latest_articles()
    {
        $latest_articles = Article::where('status', true)->latest()->limit(2)->get();
        return ArticleResource::collection($latest_articles);
    }

    public function article($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return new ArticleResource($article);
    }

    public function search(Request $request)
    {
        $search = $request->q;
        $articles = Article::where('title', "like", "%$search%")->get();
        return ArticleResource::collection($articles);
    }
}

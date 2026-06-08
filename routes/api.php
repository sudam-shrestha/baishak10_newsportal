<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/categories", [ApiController::class, 'categories']);
Route::get("/category/{slug}", [ApiController::class, 'category']);

Route::get("/latest-articles", [ApiController::class, 'latest_articles']);
Route::get("/article/{slug}", [ApiController::class, 'article']);
Route::get("/search-articles", [ApiController::class, 'search']);

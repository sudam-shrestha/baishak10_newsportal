<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get("/categories", [ApiController::class, 'categories']);
    Route::get("/category/{slug}", [ApiController::class, 'category']);
    Route::post("/category/store", [CategoryController::class, 'store']);
    Route::patch("/category/update/{id}", [CategoryController::class, 'update']);
    Route::delete("/category/delete/{id}", [CategoryController::class, 'delete']);
    Route::get("/latest-articles", [ApiController::class, 'latest_articles']);
});

Route::get("/article/{slug}", [ApiController::class, 'article']);
Route::get("/search-articles", [ApiController::class, 'search']);


Route::post("/register", [AuthController::class, 'register']);
Route::post("/login", [AuthController::class, 'login']);

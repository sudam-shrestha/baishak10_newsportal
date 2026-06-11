<?php

use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [PageController::class, 'home'])->name("home");
Route::get("/news/{slug}", [PageController::class, 'article'])->name("article");
Route::get("/category/{slug}", [PageController::class, 'category'])->name("category");
Route::get("/search", [PageController::class, 'search'])->name("search");

// Route::get('/login', function () {
//     return response()->json([
//         "status"=>false,
//         "message"=>"Unauthorized"
//     ]);
// })->name('login');

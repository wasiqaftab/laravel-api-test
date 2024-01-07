<?php

use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('/users/me', function () {
        return response()->json(['user' => auth()->user()]);
    });

    Route::get('/quotes', [QuoteController::class, 'getQuotes']);
    Route::get('/quotes/refresh', [QuoteController::class, 'refreshQuotes']);
});


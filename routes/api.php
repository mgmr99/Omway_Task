<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/news', [App\Http\Controllers\api\GetNewsController::class, 'index'])->name('news.get');
Route::post('/news/insert', [App\Http\Controllers\api\GetNewsController::class, 'create'])->name('news.create');

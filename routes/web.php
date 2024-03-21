<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;

Route::get('/', [NewsController::class,'index'])->name("news.index");

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class,'index'])->name("categories.index");
    Route::get('/create', [CategoryController::class,'create'])->name("categories.create");
    Route::post('/store', [CategoryController::class,'store'])->name("categories.store");
    Route::get('/{id}', [CategoryController::class,'show'])->name("categories.show");
    Route::get('/{id}/edit', [CategoryController::class,'edit'])->name("categories.edit");
    Route::put('/{id}', [CategoryController::class,'update'])->name("categories.update");
    Route::delete('/{id}', [CategoryController::class,'destroy'])->name("categories.destroy");
});

Route::prefix('news')->group(function () {
    Route::get('/create', [NewsController::class,'create'])->name("news.create");
    Route::post('/store', [NewsController::class,'store'])->name("news.store");
    // Route::get('/{id}', [NewsController::class,'show'])->name("news.show");
    Route::get('/{id}/edit', [NewsController::class,'edit'])->name("news.edit");
    Route::put('/{id}', [NewsController::class,'update'])->name("news.update");
    Route::delete('/{id}', [NewsController::class,'destroy'])->name("news.destroy");
    Route::get('/{id}/publish', [NewsController::class,'publish'])->name("news.publish");
    Route::get('/{id}/unpublish', [NewsController::class,'unpublish'])->name("news.unpublish");
    Route::get('/search', [NewsController::class,'search'])->name("news.search");
});



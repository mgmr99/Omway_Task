<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// api routes for news and categories

Route::get('/news', 'App\Http\Controllers\NewsController@index');
Route::post('/news/store', 'App\Http\Controllers\NewsController@store');
Route::get('/news/{id}', 'App\Http\Controllers\NewsController@show');
Route::put('/news/{id}', 'App\Http\Controllers\NewsController@update');
Route::delete('/news/{id}', 'App\Http\Controllers\NewsController@destroy');


Route::get('/categories', 'App\Http\Controllers\CategoryController@index');
Route::post('/categories/store', 'App\Http\Controllers\CategoryController@store');
Route::get('/categories/{id}', 'App\Http\Controllers\CategoryController@show');
Route::put('/categories/{id}', 'App\Http\Controllers\CategoryController@update');
Route::delete('/categories/{id}', 'App\Http\Controllers\CategoryController@destroy');

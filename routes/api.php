<?php

use App\Http\Controllers\Api\V1\BookController;
use App\Http\Controllers\Api\V1\AuthorController;
use App\Http\Controllers\Api\V1\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix'=> 'v1','namespace'=>'App\Http\Controllers\Api\V1'], function () {
    Route::apiResource('books',BookController::class);
    Route::apiResource('authors', AuthorController::class);
    Route::apiResource('genres', GenreController::class);
});
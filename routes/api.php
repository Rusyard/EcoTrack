<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ShuttleApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/shuttles', [ShuttleApiController::class, 'index']);
Route::get('/shuttles/{id}', [ShuttleApiController::class, 'show']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ShuttleApiController;

<<<<<<< HEAD
Route::get('/shuttles', [ShuttleApiController::class, 'index']);
Route::get('/shuttles/{id}', [ShuttleApiController::class, 'show']);
=======
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/shuttles', [ShuttleApiController::class, 'index']);
Route::get('/shuttles/{id}', [ShuttleApiController::class, 'show']);
>>>>>>> cfe9dc65b0322ecc48d1fde2aabb33cc07e2fbb5

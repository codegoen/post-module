<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\Api\CategoryJsonController;
use Modules\Post\Http\Controllers\Api\PostJsonController;
use Modules\Post\Http\Controllers\Api\SubscribeJsonController;

Route::apiResource('/posts', PostJsonController::class);
Route::apiResource('/categories', CategoryJsonController::class);

Route::post('/subscribe', [SubscribeJsonController::class, 'subscribe']);
Route::get('/unsubscribe', [SubscribeJsonController::class, 'unsubscribe']);
Route::get('/subscribe/validate', [SubscribeJsonController::class, 'validate']);

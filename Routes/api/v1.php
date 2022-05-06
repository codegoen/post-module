<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\Api\CategoryJsonController;
use Modules\Post\Http\Controllers\Api\PostJsonController;

Route::apiResource('/posts', PostJsonController::class);
Route::apiResource('/categories', CategoryJsonController::class);

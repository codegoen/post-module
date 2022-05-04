<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\Api\PostJsonController;
use Modules\Post\Http\Controllers\Api\CategoryJsonController;

Route::apiResource('/post', PostJsonController::class);
Route::apiResource('/category', CategoryJsonController::class);

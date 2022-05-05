<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\Api\CategoryJsonController;
use Modules\Post\Http\Controllers\Api\PostJsonController;

Route::apiResource('/post', PostJsonController::class);
Route::apiResource('/category', CategoryJsonController::class);

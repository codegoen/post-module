<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\Api\CategoryJsonController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::resource('post', PostController::class);
    Route::resource('tag', TagController::class);
    Route::resource('category', CategoryController::class);
    Route::get('select/category', [CategoryJsonController::class, 'index']);
});

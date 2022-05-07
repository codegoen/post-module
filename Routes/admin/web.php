<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\Api\CategoryJsonController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::resource('post', PostController::class);
    Route::resource('category', CategoryController::class);

    Route::get('subscriber', SubscriberController::class)->name('subscriber.index');

    Route::get('select/category', [CategoryJsonController::class, 'index']);
});

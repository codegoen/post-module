<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\Api\CategoryJsonController;
use Modules\Post\Http\Controllers\SettingController;

Route::middleware(['web', 'auth'])->prefix('post')->as('post.')->group(function () {
    Route::resource('/post', PostController::class);
    Route::resource('/category', CategoryController::class);
    Route::get('/subscriber', SubscriberController::class)->name('subscriber.index');
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');

    Route::get('/select/category', [CategoryJsonController::class, 'index']);
});

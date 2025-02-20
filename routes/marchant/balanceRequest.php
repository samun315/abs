<?php

use App\Http\Controllers\Marchant\RequestWhitelistApproveController;
use App\Http\Controllers\Marchant\RequestWhitelistController;
use Illuminate\Support\Facades\Route;
// marchant.balance.request.index

Route::group(['prefix' => 'balance/request'], function () {
    Route::get('/', [RequestWhitelistController::class, 'index'])->name('index');
    Route::post('/store', [RequestWhitelistController::class, 'store'])->name('store');
});

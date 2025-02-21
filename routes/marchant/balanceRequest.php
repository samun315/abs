<?php

use App\Http\Controllers\Marchant\BalanceRequestController;
use Illuminate\Support\Facades\Route;
// marchant.balance.request.index

Route::group(['prefix' => 'balance/request'], function () {
    Route::get('/', [BalanceRequestController::class, 'index'])->name('index');
    Route::post('/store', [BalanceRequestController::class, 'store'])->name('store');
});

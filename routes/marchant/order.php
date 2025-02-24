<?php

use App\Http\Controllers\Marchant\OrderBalanceController;
use Illuminate\Support\Facades\Route;
// marchant.balance.request.index

Route::group(['prefix' => 'order/balance'], function () {
    Route::get('/', [OrderBalanceController::class, 'index'])->name('index');
    Route::get('/create', [OrderBalanceController::class, 'create'])->name('create');
    Route::get('/gateway-info/{gateway_id}', [OrderBalanceController::class, 'gatewayInfo'])->name('gatewayInfo');
    Route::post('/store', [OrderBalanceController::class, 'store'])->name('store');
    Route::get('/details/{order_id}', [OrderBalanceController::class, 'getOrderDetails'])->name('getOrderDetails');
    
});


// Route::group(['prefix' => 'all/balance/request', 'as' => 'approve.'], function () {
//     Route::get('/', [BalanceRequestApproveController::class, 'index'])->name('index');
//     Route::put('/update-status/{id}', [BalanceRequestApproveController::class, 'updateStatus'])->name('updateStatus');
// });
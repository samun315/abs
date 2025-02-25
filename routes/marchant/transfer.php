<?php

use App\Http\Controllers\Marchant\TransferApproveController;
use App\Http\Controllers\Marchant\TransferController;
use Illuminate\Support\Facades\Route;
// marchant.transfer.balance.index

Route::group(['prefix' => 'transfer/balance'], function () {
    Route::get('/', [TransferController::class, 'index'])->name('index');
    Route::get('/create', [TransferController::class, 'create'])->name('create');
    Route::get('/gateway-info/{gateway_id}', [TransferController::class, 'gatewayInfo'])->name('gatewayInfo');
    Route::post('/store', [TransferController::class, 'store'])->name('store');
    Route::get('/details/{order_id}', [TransferController::class, 'getOrderDetails'])->name('getOrderDetails');
    
});

// marchant.transfer.balance.approve.index
Route::group(['prefix' => 'all/transfer/balance', 'as' => 'approve.'], function () {
    Route::get('/', [TransferApproveController::class, 'index'])->name('index');
    Route::put('/update-status/{id}', [TransferApproveController::class, 'updateStatus'])->name('updateStatus');
});
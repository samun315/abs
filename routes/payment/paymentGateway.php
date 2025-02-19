<?php

use App\Http\Controllers\Payment\PaymentGatewayController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'manual/gateway', 'as' => 'gateway.'], function () {
Route::get('/',[PaymentGatewayController::class,'index'])->name('index');
Route::post('/store',[PaymentGatewayController::class,'store'])->name('store');
Route::get('/get-gateway-details/{id}',[PaymentGatewayController::class,'getGatewayDetails'])->name('getGatewayDetails');
Route::get('/edit/{id}',[PaymentGatewayController::class,'edit'])->name('edit');
Route::put('/update/{id}',[PaymentGatewayController::class,'update'])->name('update');
Route::delete('/destroy/{id}',[PaymentGatewayController::class,'destroy'])->name('destroy');
});
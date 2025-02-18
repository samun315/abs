<?php

use App\Http\Controllers\Payment\PaymentGatewayController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'manual/gateway', 'as' => 'gateway.'], function () {
Route::get('/',[PaymentGatewayController::class,'index'])->name('index');
// Route::post('/whitelist/store',[RequestWhitelistController::class,'store'])->name('store');
});
<?php

use App\Http\Controllers\Marchant\RequestWhitelistController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'request', 'as' => 'whitelist.'], function () {
Route::get('/whitelist',[RequestWhitelistController::class,'index'])->name('index');
Route::post('/whitelist/store',[RequestWhitelistController::class,'store'])->name('store');
});
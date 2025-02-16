<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
//Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('/module-list', function () {
    return view('moduleList.index');
});

//Private Routes
Route::middleware(['preventBackHistory', 'user'])->group(function () {

    //Logout
    Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');

    //Dashboard Route
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //User
    Route::controller(UserController::class)->group(function () {
        Route::get('users/index', 'index')->name('user.index');
        Route::post('users/store', 'store')->name('user.store');
        Route::get('users/edit/{user_id}', 'edit')->name('user.edit');
        Route::put('users/update/{user_id}', 'update')->name('user.update');
        //    Route::get('create', 'create')->name('user.create');
        //    Route::get('{user_id}/edit', 'edit')->name('user.edit');
        //    Route::put('{user_id}/update', 'update')->name('user.update');
        //    Route::put('update-status', 'updateStatus')->name('user.update.status');
    });
});

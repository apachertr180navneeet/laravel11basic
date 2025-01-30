<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    AuthController,
};

Route::get('/', function () {
    return view('welcome');
});


// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::get('forget-password', 'showForgetPassword')->name('forget.password.get');
        Route::get('reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
    });
});

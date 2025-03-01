<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    AuthController,
    DashboardController,
    SubCompanyController
};

use App\Http\Middleware\{
    AdminMiddleware
};

Route::get('/', function () {
    return view('welcome');
});


// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'loginPost')->name('login.post');
        Route::get('forget-password', 'showForgetPassword')->name('forget.password.get');
    });
    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('logout', 'logout')->name('logout');
            Route::get('getprofile', 'getProfile')->name('get.profile');
            Route::post('updateprofile', 'updateProfile')->name('update.profile');
            Route::get('cahngepassword', 'changePassowrd')->name('change.password');
            Route::post('updatepassword', 'updatePassword')->name('update.passowrd');
        });
        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'index')->name('dashboard');
        });

        Route::controller(SubCompanyController::class)->prefix('sub-company')->name('sub.company.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/getall', 'getAll')->name('getall');
        });
    });
});

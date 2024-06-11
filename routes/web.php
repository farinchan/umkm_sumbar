<?php

use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\Back\Admin\DashboardController;
use App\Http\Controllers\Web\Back\Admin\ProductCategoryController;
use App\Http\Controllers\Web\Back\Admin\UserController;
use App\Http\Controllers\web\front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, "index"])->name('home');

Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class, "index"])->name('login');
    Route::post('/login', [AuthController::class, "loginPost"])->name('login.post');
    Route::post('/register', [AuthController::class, "registerPost"])->name('register.post');
    Route::get('/logout', [AuthController::class, "logout"])->name('logout');
});

Route::middleware(['auth'])->prefix("/back")->group(function () {

    Route::middleware(['role:superadmin'])->prefix("/admin")->name("admin.")->group(function () {
        Route::get('/dashboard', DashboardController::class)->name('dashboard');

        Route::prefix('/pengguna')->name('pengguna.')->group(function () {
            Route::get('/', [UserController::class, 'user'])->name('index');
            Route::post('/store', [UserController::class, 'userStore'])->name('store');
            Route::put('/{id}/update', [UserController::class, 'userUpdate'])->name('update');
            Route::delete('/{id}/destroy', [UserController::class, 'userDestroy'])->name('destroy');
            
        });

        Route::prefix('/product/category')->name('product.category.')->group(function () {
            Route::get('/', [ProductCategoryController::class, 'index'])->name('index');
            Route::get('/create', [ProductCategoryController::class, 'create'])->name('create');

            Route::post('/store', [ProductCategoryController::class, 'store'])->name('store');
            Route::put('/{id}/update', [ProductCategoryController::class, 'update'])->name('update');
            Route::delete('/{id}/destroy', [ProductCategoryController::class, 'destroy'])->name('destroy');
        });

    });
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

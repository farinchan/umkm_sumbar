<?php

use App\Http\Controllers\web\Auth\AuthController;
use App\Http\Controllers\web\back\Account\AccountController;
use App\Http\Controllers\web\back\Admin\CityController;
use App\Http\Controllers\web\back\Admin\DashboardController;
use App\Http\Controllers\web\back\Admin\FileManagerController;
use App\Http\Controllers\web\back\admin\NewsController;
use App\Http\Controllers\web\back\Admin\ProductCategoryController;
use App\Http\Controllers\web\back\Admin\ProductController;
use App\Http\Controllers\web\back\Admin\SettingController;
use App\Http\Controllers\web\back\Admin\ShopController;
use App\Http\Controllers\web\back\Admin\UserController;
use App\Http\Controllers\web\back\Shop\ShopController as backShopController;
use App\Http\Controllers\web\back\Shop\ProductController as backProductController;
use App\Http\Controllers\web\front\CartController;
use App\Http\Controllers\Web\Front\HomeController;
use App\Http\Controllers\web\front\ProductController as frontProductController;
use App\Http\Controllers\web\front\NewsController as frontNewsController;
use App\Http\Controllers\web\front\ShopController as frontShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/product', [frontProductController::class, "index"])->name('product-all');
Route::get('/product/{slug}', [frontProductController::class, "product"])->name('product');
Route::post('/product/{slug}/review', [frontProductController::class, "postReview"])->name('product-review');
Route::put('/product/{slug}/review', [frontProductController::class, "updateReview"])->name('product-review-update');
Route::get('/product/category/{slug}', [frontProductController::class, "category"])->name('product-category');

Route::get('/cart', [CartController::class, "cart"])->name('cart')->middleware('auth');
Route::get('/cart/api', [CartController::class, "cartApi"])->name('cart-api');
Route::delete('/cart/{id}/remove', [CartController::class, "removeCart"])->name('cart-remove');
Route::post('/cart/add', [CartController::class, "addToCart"])->name('cart-add');

Route::get('/news', [frontNewsController::class, "index"])->name('news');
Route::get('/news/{slug}', [frontNewsController::class, "show"])->name('news-show');
Route::get('/about', [HomeController::class, "about"])->name('about');
Route::get('/help', [HomeController::class, "help"])->name('help');
Route::get('/shop', [frontShopController::class, "index"])->name('shop');
Route::get('/shop/{slug}', [frontShopController::class, "shop"])->name('shop-detail');

Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class, "index"])->name('login');
    Route::post('/login', [AuthController::class, "loginPost"])->name('login.post');
    Route::post('/register', [AuthController::class, "registerPost"])->name('register.post');
    Route::get('/logout', [AuthController::class, "logout"])->name('logout');
});

Route::middleware(['auth'])->prefix("/back")->group(function () {

    Route::get('/information', [DashboardController::class, 'information'])->name('information');


    Route::prefix('/admin')->name('admin.')->group(function () {

        Route::middleware(['role:superadmin'])->group(function () {

            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

            Route::get('/file-manager', [FileManagerController::class, 'index'])->name('file-manager');

            Route::prefix('/kota')->name('kota.')->group(function () {
                Route::get('/', [CityController::class, 'index'])->name('index');
                Route::post('/store', [CityController::class, 'store'])->name('store');
                Route::put('/{id}/update', [CityController::class, 'update'])->name('update');
                Route::delete('/{id}/destroy', [CityController::class, 'destroy'])->name('destroy');
            });

            Route::prefix('/pengguna')->name('pengguna.')->group(function () {
                Route::get('/', [UserController::class, 'user'])->name('index');
                Route::post('/store', [UserController::class, 'userStore'])->name('store');
                Route::put('/{id}/update', [UserController::class, 'userUpdate'])->name('update');
                Route::delete('/{id}/destroy', [UserController::class, 'userDestroy'])->name('destroy');
                Route::post('/import', [UserController::class, 'userImport'])->name('import');

                Route::prefix('/super-admin')->name('superadmin.')->group(function () {
                    Route::get('/', [UserController::class, 'superadmin'])->name('index');
                    Route::post('/store', [UserController::class, 'superadminStore'])->name('store');
                    Route::put('/{id}/update', [UserController::class, 'superadminUpdate'])->name('update');
                    Route::delete('/{id}/destroy', [UserController::class, 'superadminDestroy'])->name('destroy');
                });

                Route::prefix('/admin')->name('admin.')->group(function () {
                    Route::get('/', [UserController::class, 'admin'])->name('index');
                    Route::post('/store', [UserController::class, 'adminStore'])->name('store');
                    Route::put('/{id}/update', [UserController::class, 'adminUpdate'])->name('update');
                    Route::delete('/{id}/destroy', [UserController::class, 'adminDestroy'])->name('destroy');
                });
            });

            Route::prefix('/product/category')->name('product.category.')->group(function () {
                Route::get('/', [ProductCategoryController::class, 'index'])->name('index');
                Route::get('/create', [ProductCategoryController::class, 'create'])->name('create');
                Route::post('/store', [ProductCategoryController::class, 'store'])->name('store');
                Route::put('/{id}/update', [ProductCategoryController::class, 'update'])->name('update');
                Route::delete('/{id}/destroy', [ProductCategoryController::class, 'destroy'])->name('destroy');
            });

            Route::prefix('setting')->name('setting.')->group(function () {
                Route::get('/banner', [SettingController::class, 'banner'])->name('banner');
                Route::put('/banner/{id}/update', [SettingController::class, 'bannerUpdate'])->name('banner-update');

                Route::get('/website', [SettingController::class, 'website'])->name('website');
                Route::put('/website/update', [SettingController::class, 'websiteUpdate'])->name('website-update');
                Route::put('/website/information-update', [SettingController::class, 'informationUpdate'])->name('information-update');
            });
        });

        Route::middleware(['role:admin|superadmin'])->group(function () {

            Route::prefix('toko')->name('toko.')->group(function () {
                Route::get('/', [ShopController::class, 'index'])->name('index');
                Route::get('/create', [ShopController::class, 'create'])->name('create');
                Route::get('/{id}/show', [ShopController::class, 'show'])->name('show');
                Route::post('/store', [ShopController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [ShopController::class, 'edit'])->name('edit');
                Route::put('/{id}/update', [ShopController::class, 'update'])->name('update');
                Route::delete('/{id}/destroy', [ShopController::class, 'destroy'])->name('destroy');

                Route::get('/{id}/detail', [ShopController::class, 'detail'])->name('detail');
                Route::get('/{id}/detail/product', [ShopController::class, 'detailProduct'])->name('detail-product');
                Route::get('/{id}/detail/follower', [ShopController::class, 'detailFollower'])->name('detail-follower');
            });

            Route::prefix('product')->name('product.')->group(function () {
                Route::get('/', [ProductController::class, 'index'])->name('index');
                Route::get('/create', [ProductController::class, 'create'])->name('create');
                Route::post('/store', [ProductController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
                Route::put('/{id}/update', [ProductController::class, 'update'])->name('update');
                Route::delete('/{id}/destroy', [ProductController::class, 'destroy'])->name('destroy');

                Route::get('/{id}/detail', [ProductController::class, 'detail'])->name('detail');
                Route::get('/{id}/detail/review', [ProductController::class, 'detailReview'])->name('detail-review');
                Route::get('/{id}/detail/viewer', [ProductController::class, 'detailViewer'])->name('detail-viewer');
                Route::get('/{id}/detail/image', [ProductController::class, 'detailImage'])->name('detail-image');
                Route::post('/{id}/detail/image/store', [ProductController::class, 'detailImageStore'])->name('detail-image-store');
                Route::delete('/{id}/detail/image/destroy', [ProductController::class, 'detailImageDestroy'])->name('detail-image-destroy');

                Route::get('/review', [ProductController::class, 'review'])->name('review');
                Route::get('/viewer', [ProductController::class, 'viewer'])->name('viewer');
            });

            Route::prefix('/news')->name('news.')->group(function () {

                Route::get('/category', [NewsController::class, 'category'])->name('category.index');
                Route::post('/category/store', [NewsController::class, 'categoryStore'])->name('category.store');
                Route::put('/category/{id}/update', [NewsController::class, 'categoryUpdate'])->name('category.update');
                Route::delete('/category/{id}/destroy', [NewsController::class, 'categoryDestroy'])->name('category.destroy');

                Route::get('/', [NewsController::class, 'index'])->name('index');
                Route::get('/create', [NewsController::class, 'create'])->name('create');
                Route::post('/store', [NewsController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [NewsController::class, 'edit'])->name('edit');
                Route::put('/{id}/update', [NewsController::class, 'update'])->name('update');
                Route::delete('/{id}/destroy', [NewsController::class, 'destroy'])->name('destroy');
            });
        });
    });

    Route::prefix('shop')->name('shop.')->group(function () {
        Route::get('/create', [backShopController::class, 'create'])->name('create');
        Route::post('/store', [backShopController::class, 'store'])->name('store');
        Route::get('/edit', [backShopController::class, 'edit'])->name('edit');
        Route::put('/update', [backShopController::class, 'update'])->name('update');
        Route::delete('/destroy', [backShopController::class, 'destroy'])->name('destroy');

        Route::get('/detail', [backShopController::class, 'detail'])->name('detail');
        Route::get('/detail/product', [backShopController::class, 'detailProduct'])->name('detail-product');
        Route::get('/detail/follower', [backShopController::class, 'detailFollower'])->name('detail-follower');


        Route::prefix('/product')->name('product.')->group(function () {
            Route::get('/create', [backProductController::class, 'create'])->name('create');
            Route::post('/store', [backProductController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [backProductController::class, 'edit'])->name('edit');
            Route::put('/{id}/update', [backProductController::class, 'update'])->name('update');
            Route::delete('/{id}/destroy', [backProductController::class, 'destroy'])->name('destroy');

            Route::get('/{id}/detail', [backProductController::class, 'detail'])->name('detail');
            Route::get('/{id}/review', [backProductController::class, 'detailReview'])->name('review');
            Route::get('/{id}/viewer', [backProductController::class, 'detailViewer'])->name('viewer');
            Route::get('/{id}/image', [backProductController::class, 'detailImage'])->name('image');
            Route::post('/{id}/image/store', [backProductController::class, 'detailImageStore'])->name('image.store');
            Route::delete('/{id}/image/destroy', [backProductController::class, 'detailImageDestroy'])->name('image.destroy');

            Route::get('/review', [backProductController::class, 'review'])->name('review-all');
            Route::get('/viewer', [backProductController::class, 'viewer'])->name('viewer-all');
        });
    });

    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/profile', [AccountController::class, 'profile'])->name('profile');
        Route::put('/profile/update', [AccountController::class, 'profileUpdate'])->name('profile.update');
        Route::put('/profile/change-email', [AccountController::class, 'changeEmail'])->name('profile.changeEmail');
        Route::put('/profile/change-password', [AccountController::class, 'changePassword'])->name('profile.changePassword');
        Route::delete('/profile/delete', [AccountController::class, 'deleteAccount'])->name('profile.delete');
    });

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

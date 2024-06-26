<?php

use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\Back\Admin\CityController;
use App\Http\Controllers\Web\Back\Admin\DashboardController;
use App\Http\Controllers\Web\Back\Admin\FileManagerController;
use App\Http\Controllers\web\back\admin\newsController;
use App\Http\Controllers\Web\Back\Admin\ProductCategoryController;
use App\Http\Controllers\Web\Back\Admin\ProductController;
use App\Http\Controllers\web\back\admin\SettingController;
use App\Http\Controllers\Web\Back\Admin\ShopController;
use App\Http\Controllers\Web\Back\Admin\UserController;
use App\Http\Controllers\Web\Back\shop\ShopController as backShopController;
use App\Http\Controllers\web\front\HomeController;
use App\Http\Controllers\Web\front\ProductController as frontProductController;
use App\Http\Controllers\Web\front\NewsController as frontNewsController;
use App\Http\Controllers\Web\front\ShopController as frontShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/product', [frontProductController::class, "index"])->name('product-all');
Route::get('/product/{slug}', [frontProductController::class, "product"])->name('product');
Route::get('/product/category/{slug}', [frontProductController::class, "category"])->name('product-category');
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
                Route::post('/banner/store', [SettingController::class, 'bannerStore'])->name('banner.store');
                Route::delete('/banner/destroy', [SettingController::class, 'bannerDestroy'])->name('banner.destroy');

                Route::get('/website', [SettingController::class, 'website'])->name('website');
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
            });

            Route::prefix('/news')->name('news.')->group(function () {

                Route::get('/category', [newsController::class, 'category'])->name('category.index');
                Route::post('/category/store', [newsController::class, 'categoryStore'])->name('category.store');
                Route::put('/category/{id}/update', [newsController::class, 'categoryUpdate'])->name('category.update');
                Route::delete('/category/{id}/destroy', [newsController::class, 'categoryDestroy'])->name('category.destroy');

                Route::get('/', [newsController::class, 'index'])->name('index');
                Route::get('/create', [newsController::class, 'create'])->name('create');
                Route::post('/store', [newsController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [newsController::class, 'edit'])->name('edit');
                Route::put('/{id}/update', [newsController::class, 'update'])->name('update');
                Route::delete('/{id}/destroy', [newsController::class, 'destroy'])->name('destroy');
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
            Route::get('/', [backShopController::class, 'detailProduct'])->name('index');
            Route::get('/create', [backShopController::class, 'ProductCreate'])->name('create');
            Route::post('/store', [backShopController::class, 'ProductStore'])->name('store');
            Route::get('/{id}/edit', [backShopController::class, 'ProductEdit'])->name('edit');
            Route::put('/{id}/update', [backShopController::class, 'ProductUpdate'])->name('update');
            Route::delete('/{id}/destroy', [backShopController::class, 'ProductDestroy'])->name('destroy');

            Route::get('/{id}/review', [backShopController::class, 'ProductReview'])->name('review');
            Route::get('/{id}/viewer', [backShopController::class, 'ProductViewer'])->name('viewer');
            Route::get('/{id}/image', [backShopController::class, 'ProductImage'])->name('image');
            Route::post('/{id}/image/store', [backShopController::class, 'ProductImageStore'])->name('image.store');
            Route::delete('/{id}/image/destroy', [backShopController::class, 'ProductImageDestroy'])->name('image.destroy');
        });
    });

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

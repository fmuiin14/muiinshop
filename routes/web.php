<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [FrontendController::class, 'index'])->name('homefe');
Route::get('/product/{slug}/{id}', [ProductController::class, 'detail']);



// Dashboard User
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('user-dashboard');
});

// Dashboard Admin
Route::group(['prefix' => 'admin','middleware' => (['auth', 'role:admin'])], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard-index');
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('coupon', CouponController::class);
    Route::resource('order', OrderController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('slider', SliderController::class);
    // Route::get('/user', [UserController::class, 'index'])->name('admin-user-index');

});

Auth::routes();

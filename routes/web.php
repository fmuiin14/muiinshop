<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\UserController;
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



// Dashboard User
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('user-dashboard');
});

// Dashboard Admin
Route::group(['prefix' => 'admin','middleware' => (['auth', 'role:admin'])], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard-index');
    // Route::get('/user', [UserController::class, 'index'])->name('admin-user-index');
});

Auth::routes();

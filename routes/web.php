<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TransactionController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/', [HomeController::class, 'index']);

Route::get('/detail{slug}', [DetailController::class, 'index']);

Route::get(
    '/detail/{slug}',
    [DetailController::class, 'index']
)->name('detail');

Route::post(
    '/checkout/{id}',
    [CheckoutController::class, 'process']
)->name('checkout_process')->middleware(['auth', 'verified']);

Route::get(
    '/checkout/{id}',
    [CheckoutController::class, 'index']
)->name('checkout')->middleware(['auth', 'verified']);

Route::post(
    '/checkout/create/{id}',
    [CheckoutController::class, 'create']
)->name('checkout-create')->middleware(['auth', 'verified']);

Route::get(
    '/checkout/remove/{id}',
    [CheckoutController::class, 'remove']
)->name('checkout-remove')->middleware(['auth', 'verified']);

Route::get(
    '/checkout/confirm/{id}',
    [CheckoutController::class, 'success']
)->name('checkout-success')->middleware(['auth', 'verified']);


Route::prefix('admin')->group(function() {
    Route::group(['middleware' => ['auth','admin']], function() {
        Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

        Route::get(
            '/dashboard',
            [DashboardController::class, 'index']
        )->name('dashboard');

        Route::get(
            '/travel-package',
            [TravelPackageController::class, 'index']
        )->name('travel-package');

        Route::get(
            '/travel-package/create}',
            [TravelPackageController::class, 'create']
        )->name('travel-package.create');

        Route::post(
            '/travel-package/store}',
            [TravelPackageController::class, 'store']
        )->name('travel-package.store');

        Route::get(
            '/travel-package/edit/{id}',
            [TravelPackageController::class, 'edit']
        )->name('travel-package.edit');

        Route::post(
            '/travel-package/update/{id}',
            [TravelPackageController::class, 'update']
        )->name('travel-package.update');

        Route::delete(
            '/travel-package/destroy/{id}',
            [TravelPackageController::class, 'destroy']
        )->name('travel-package.destroy');



        Route::get(
            '/gallery',
            [GalleryController::class, 'index']
        )->name('gallery');

        Route::get(
            '/gallery/create',
            [GalleryController::class, 'create']
        )->name('gallery.create');

        Route::post(
            '/gallery/store',
            [GalleryController::class, 'store']
        )->name('gallery.store');

        Route::get(
            '/gallery/edit/{id}',
            [GalleryController::class, 'edit']
        )->name('gallery.edit');

        Route::post(
            '/gallery/update/{id}',
            [GalleryController::class, 'update']
        )->name('gallery.update');

        Route::delete(
            '/gallery/destroy/{id}',
            [GalleryController::class, 'destroy']
        )->name('gallery.destroy');

        // Transaction
        Route::get(
            '/transaction',
            [TransactionController::class, 'index']
        )->name('transaction');

        Route::get(
            '/transaction/show/{id}',
            [TransactionController::class, 'show']
        )->name('transaction.show');

        Route::get(
            '/transaction/edit/{id}',
            [TransactionController::class, 'edit']
        )->name('transaction.edit');

        Route::post(
            '/transaction/update/{id}',
            [TransactionController::class, 'update']
        )->name('transaction.update');

        Route::delete(
            '/transaction/destroy/{id}',
            [TransactionController::class, 'destroy']
        )->name('transaction.destroy');
    });
});



Route::get('/home', [HomeController::class, 'index'])->name('home');

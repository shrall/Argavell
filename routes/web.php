<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\User\FaqController;
use App\Http\Controllers\User\ResellerController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/argan-oil', [PageController::class, 'arganoil'])->name('page.arganoil');
Route::get('/argan-shampoo', [PageController::class, 'arganshampoo'])->name('page.arganshampoo');
Route::get('/kleanse', [PageController::class, 'kleanse'])->name('page.kleanse');
Route::resource('authorized-reseller', ResellerController::class);
Route::get('/terms-and-conditions', [PageController::class, 'termsconditions'])->name('page.termsconditions');
Route::resource('faq', FaqController::class);
Route::get('/return-policy', [PageController::class, 'returnpolicy'])->name('page.returnpolicy');
Route::get('/product-detail', [PageController::class, 'productdetail'])->name('page.productdetail');
Route::get('/checkout', [PageController::class, 'checkout'])->name('page.checkout');
Route::get('/payment-confirmation', [PageController::class, 'paymentconfirmation'])->name('page.paymentconfirmation');
Route::get('/profile', [PageController::class, 'profile'])->name('page.profile');
Route::get('/transactions', [PageController::class, 'transactions'])->name('page.transactions');
Route::get('/address', [PageController::class, 'address'])->name('page.address');
Route::get('/change-password', [PageController::class, 'changepassword'])->name('page.changepassword');

Route::group(['middleware' => ['user'], 'as' => 'user.'], function () {
    Route::resource('user', UserController::class);
});

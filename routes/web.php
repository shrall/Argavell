<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\FaqController;
use App\Http\Controllers\User\PolicyController;
use App\Http\Controllers\User\ProofController;
use App\Http\Controllers\User\RefundController;
use App\Http\Controllers\User\ResellerController;
use App\Http\Controllers\User\TncController;
use App\Http\Controllers\User\TransactionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/argan-oil', [PageController::class, 'arganoil'])->name('page.arganoil');
Route::get('/argan-shampoo', [PageController::class, 'arganshampoo'])->name('page.arganshampoo');
Route::get('/kleanse', [PageController::class, 'kleanse'])->name('page.kleanse');

Route::get('/terms-and-conditions', [TncController::class, 'index'])->name('page.termsconditions');
Route::get('/return-policy', [PolicyController::class, 'index'])->name('page.policy');
Route::get('/authorized-reseller', [ResellerController::class, 'index'])->name('page.reseller');
Route::get('/faqs', [FaqController::class, 'index'])->name('page.faq');
Route::get('/payment-confirmation', [ProofController::class, 'index'])->name('page.paymentconfirmation');

Route::get('/checkout', [PageController::class, 'checkout'])->name('page.checkout');
Route::get('/order', [PageController::class, 'order'])->name('page.order');

Route::resource('product', ProductController::class);

Route::group(['middleware' => ['user'], 'as' => 'user.'], function () {
    Route::resource('user', UserController::class);
    Route::resource('reseller', ResellerController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('tnc', TncController::class);
    Route::resource('policy', PolicyController::class);
    Route::resource('refund', RefundController::class);
    Route::resource('proof', ProofController::class);
    Route::resource('address', AddressController::class);
    Route::resource('transaction', TransactionController::class);
    Route::resource('cart', CartController::class);
    Route::get('change-password', [UserController::class, 'changepassword'])->name('changepassword');
    Route::post('change-password', [UserController::class, 'updatepassword'])->name('updatepassword');
});

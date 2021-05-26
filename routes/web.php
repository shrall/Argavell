<?php

use App\Http\Controllers\PageController;
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
Route::get('/authorized-reseller', [PageController::class, 'authorizedreseller'])->name('page.authorizedreseller');
Route::get('/terms-and-conditions', [PageController::class, 'termsconditions'])->name('page.termsconditions');
Route::get('/faq', [PageController::class, 'faq'])->name('page.faq');
Route::get('/return-policy', [PageController::class, 'returnpolicy'])->name('page.returnpolicy');

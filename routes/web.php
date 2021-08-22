<?php

use App\Http\Controllers\Admin\AddressController as AdminAddressController;
use App\Http\Controllers\Admin\CartController as AdminCartController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\HourController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PolicyController as AdminPolicyController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProofController as AdminProofController;
use App\Http\Controllers\Admin\RefundController as AdminRefundController;
use App\Http\Controllers\Admin\ResellerController as AdminResellerController;
use App\Http\Controllers\Admin\TncController as AdminTncController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
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
Route::get('/contact-us', [PageController::class, 'contactus'])->name('page.contactus');

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
    Route::post('cart/additem', [CartController::class, 'add_item'])->name('cart.additem');
    Route::post('cart/subtractitem', [CartController::class, 'subtract_item'])->name('cart.subtractitem');
    Route::post('transaction/getsnap', [TransactionController::class, 'get_snap'])->name('transaction.getsnap');
    Route::post('transaction/online/store', [TransactionController::class, 'online_store'])->name('transaction.onlinestore');
    Route::post('transaction/buyagain', [TransactionController::class, 'buy_again'])->name('transaction.buyagain');
});

Route::group(['middleware' => ['admin'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('page.dashboard');
    Route::resource('address', AdminAddressController::class);
    Route::resource('cart', AdminCartController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('faq', AdminFaqController::class);
    Route::resource('hour', HourController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('policy', AdminPolicyController::class);
    Route::resource('product', AdminProductController::class);
    Route::resource('proof', AdminProofController::class);
    Route::resource('refund', AdminRefundController::class);
    Route::resource('reseller', AdminResellerController::class);
    Route::resource('tnc', AdminTncController::class);
    Route::resource('transaction', AdminTransactionController::class);

    Route::post('transaction/label/view', [AdminTransactionController::class, 'view_label_transaction'])->name('transaction.viewlabeltransaction');
    Route::post('transaction/label/download', [AdminTransactionController::class, 'download_label_transaction'])->name('transaction.downloadlabeltransaction');

    Route::get('transaction/pagination/fetch_data_all', [AdminTransactionController::class, 'fetch_data_all'])->name('transaction.fetchdataall');
    Route::get('transaction/pagination/fetch_data_new', [AdminTransactionController::class, 'fetch_data_new'])->name('transaction.fetchdatanew');
    Route::get('transaction/pagination/fetch_data_ready', [AdminTransactionController::class, 'fetch_data_ready'])->name('transaction.fetchdataready');
    Route::get('transaction/pagination/fetch_data_ondelivery', [AdminTransactionController::class, 'fetch_data_ondelivery'])->name('transaction.fetchdataondelivery');
    Route::get('transaction/pagination/fetch_data_complain', [AdminTransactionController::class, 'fetch_data_complain'])->name('transaction.fetchdatacomplain');
    Route::get('transaction/pagination/fetch_data_delivered', [AdminTransactionController::class, 'fetch_data_delivered'])->name('transaction.fetchdatadelivered');
    Route::get('transaction/pagination/fetch_data_canceled', [AdminTransactionController::class, 'fetch_data_canceled'])->name('transaction.fetchdatacanceled');

    Route::post('transaction/fetch_data_all', [AdminTransactionController::class, 'fetch_data_all_search'])->name('transaction.fetchdataall.search');
    Route::post('transaction/fetch_data_new', [AdminTransactionController::class, 'fetch_data_new_search'])->name('transaction.fetchdatanew.search');
    Route::post('transaction/fetch_data_ready', [AdminTransactionController::class, 'fetch_data_ready_search'])->name('transaction.fetchdataready.search');
    Route::post('transaction/fetch_data_ondelivery', [AdminTransactionController::class, 'fetch_data_ondelivery_search'])->name('transaction.fetchdataondelivery.search');
    Route::post('transaction/fetch_data_complain', [AdminTransactionController::class, 'fetch_data_complain_search'])->name('transaction.fetchdatacomplain.search');
    Route::post('transaction/fetch_data_delivered', [AdminTransactionController::class, 'fetch_data_delivered_search'])->name('transaction.fetchdatadelivered.search');
    Route::post('transaction/fetch_data_canceled', [AdminTransactionController::class, 'fetch_data_canceled_search'])->name('transaction.fetchdatacanceled.search');

    Route::get('transaction/label/export', [AdminTransactionController::class, 'export'])->name('transaction.export');

    Route::post('product/add_bundle_item', [AdminProductController::class, 'add_bundle_item'])->name('product.addbundleitem');

    Route::resource('user', AdminUserController::class);
    Route::get('change-password', [AdminUserController::class, 'changepassword'])->name('changepassword');
    Route::post('change-password', [AdminUserController::class, 'updatepassword'])->name('updatepassword');
});

Route::post('transaction/online/check', [TransactionController::class, 'check'])->name('transaction.check');

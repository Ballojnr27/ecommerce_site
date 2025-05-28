<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\FootwearsController;


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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/edit/update', [App\Http\Controllers\HomeController::class, 'edit_profile'])->name('edit_profile')->middleware('auth');
Route::get('/male-shoes', [App\Http\Controllers\FootwearController::class, 'maleshoes'])->name('maleshoes')->middleware('auth');
Route::get('/female-shoes', [App\Http\Controllers\FootwearController::class, 'femaleshoes'])->name('femaleshoes')->middleware('auth');
Route::get('/slides', [App\Http\Controllers\FootwearController::class, 'slides'])->name('slides')->middleware('auth');
Route::get('/sandals', [App\Http\Controllers\FootwearController::class, 'sandals'])->name('sandals')->middleware('auth');

//Route::resource('cart', CartController::class);
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart')->middleware('auth');
Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');
Route::delete('/cart/search/{id}', [App\Http\Controllers\CartController::class, 'destroy_search'])->name('search.destroy')->middleware('auth');
Route::delete('/cart', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout')->middleware('auth');
Route::get('/create', [App\Http\Controllers\CartController::class, 'create'])->name('create')->middleware('auth');
Route::post('/store', [App\Http\Controllers\CartController::class, 'store'])->name('store')->middleware('auth');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'show'])->name('show')->middleware('auth');
Route::get('/cart/search', [App\Http\Controllers\CartController::class, 'search'])->name('search')->middleware('auth');
Route::get('/order_history', [App\Http\Controllers\CartController::class, 'history'])->name('history')->middleware('auth');


Route::get('/password/forget', [App\Http\Controllers\ForgetPassController::class, 'showResetForm'])->name('password.show');
Route::post('/password/new', [App\Http\Controllers\ForgetPassController::class, 'resetPassword'])->name('password.new');
Route::get('/password/create_new', [App\Http\Controllers\ForgetPassController::class, 'showNewPass'])->name('password.new.show');
Route::post('/password/createPass', [App\Http\Controllers\ForgetPassController::class, 'createNewPass'])->name('password.new.create');

Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'CheckoutForm'])->name('checkout');
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'showcheckout'])->name('showcheckout');
Route::get('/verify-payment', [App\Http\Controllers\CheckoutController::class, 'verifyPayment'])->name('verify.payment');



Auth::routes();



Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('footwears', [FootwearsController::class, 'index'])->name('footwears.index');
    Route::get('orders', [FootwearsController::class, 'orders'])->name('footwears.orders');
    Route::post('footwears', [FootwearsController::class, 'store'])->name('footwears.store');
    Route::put('footwears/{id}', [FootwearsController::class, 'update'])->name('footwears.update');
    Route::delete('footwears/{id}', [FootwearsController::class, 'destroy'])->name('footwears.destroy');
    Route::put('orders/{id}/dispatch', [FootwearsController::class, 'dispatchOrder'])->name('order.dispatch');
});

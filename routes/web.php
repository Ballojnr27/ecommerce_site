<?php

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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/maleshoes', [App\Http\Controllers\FootwearController::class, 'maleshoes'])->name('maleshoes')->middleware('auth');
Route::get('/femaleshoes', [App\Http\Controllers\FootwearController::class, 'femaleshoes'])->name('femaleshoes')->middleware('auth');
Route::get('/slides', [App\Http\Controllers\FootwearController::class, 'slides'])->name('slides')->middleware('auth');
Route::get('/sandals', [App\Http\Controllers\FootwearController::class, 'sandals'])->name('sandals')->middleware('auth');

//Route::resource('cart', CartController::class);
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart')->middleware('auth');
Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');
Route::delete('/cart', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout')->middleware('auth');
Route::get('/create', [App\Http\Controllers\CartController::class, 'create'])->name('create')->middleware('auth');
Route::post('/store', [App\Http\Controllers\CartController::class, 'store'])->name('store')->middleware('auth');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'show'])->name('show')->middleware('auth');
Route::get('/password/forget', [App\Http\Controllers\ForgetPassController::class, 'showResetForm'])->name('password.show');
Route::post('/password/new', [App\Http\Controllers\ForgetPassController::class, 'resetPassword'])->name('password.new');
Route::get('/password/create_new', [App\Http\Controllers\ForgetPassController::class, 'showNewPass'])->name('password.new.show');
Route::post('/password/createPass', [App\Http\Controllers\ForgetPassController::class, 'createNewPass'])->name('password.new.create');


Auth::routes();

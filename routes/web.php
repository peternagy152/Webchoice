<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\search;
use Illuminate\Support\Facades\Route;
use  App\Http\Livewire\Homecomponent;
use  App\Http\Livewire\shopcomponents;
use  App\Http\Livewire\categorycomponents;
use  App\Http\Livewire\cartcomponents;
use  App\Http\Livewire\admin\AdminDashboardComponents;
use  App\Http\Livewire\user\UserDashboardComponents;
use  App\Http\Livewire\checkouttcomponents;
use App\Http\Livewire\Detailscomponents;
use App\Http\Livewire\Orderdetails;
use App\Http\Livewire\Searchresult;

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

Route::get('/' , Homecomponent::class)->name('home');
Route::get('/cart' , cartcomponents::class)->name(('cart'));
Route::get('/shop' , shopcomponents::class ) ->name('shop');
Route::resource('/proceed_order' , OrderController::class);
Route::get('/checkout' , [OrderController::class , 'index'])->name('checkout');
Route::get('/cat/{category_name}' , categorycomponents::class)->name('cat');
Route::get('/details/{product_details}' , Detailscomponents::class)->name('product.details');
Route::get('/result/{keyword}' , Searchresult::class)->name('search.result');
Route::get('/add_to_cart/{product_id}' , [shopcomponents::class , 'store'])->name('cart.add');
Route::get('/destroy_cart' , [cartcomponents::class , 'Empty_cart'])->name('cart.empty');
Route::get('/remove_item/{rowId}' , [cartcomponents::class , 'Remove_item'])->name('cart.remove');
Route::view('/thankyou', 'custom views.thankyou')->name('thankyou');
Route::get('/order_details/{order_details}' , Orderdetails::class)->name('order.details');
Route::get('/search' , [search::class , 'store'])->name('search');

/*

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/
// For Normal User
Route::middleware(['auth:sanctum' , 'verified'])->group(function(){
    Route::get('/user/dashboard' , UserDashboardComponents::class)->name('user.dashboard') ;

});

// For Admin Authenticating
Route::middleware(['auth:sanctum' , 'verified' , 'AuthAdmin'])->group(function(){
    Route::get('/admin/dashboard' , AdminDashboardComponents::class) -> name('admin.dashboard');
});

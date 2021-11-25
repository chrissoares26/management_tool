<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;



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
//     return 'Welcome';
// });

Route::get('/', [\App\Http\Controllers\MainController::class, 'main'])->name('site.index');
Route::get('/about-us', [\App\Http\Controllers\AboutUsController::class, 'about'])->name('site.about');
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact'])->name('site.contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'save'])->name('site.contact');
Route::get('/login/{erro?}',[\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login',[\App\Http\Controllers\LoginController::class, 'auth'])->name('site.login');

Route::middleware('authentication:standard')->prefix('/app')->group(function() {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('app.home');
    Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('app.logout');
    Route::get('/vendor', 'App\Http\Controllers\VendorController@index')->name('app.vendor');
    Route::post('/vendor/list', 'App\Http\Controllers\VendorController@list')->name('app.vendor.list');
    Route::get('/vendor/list', 'App\Http\Controllers\VendorController@list')->name('app.vendor.list');
    Route::get('/vendor/add', 'App\Http\Controllers\VendorController@add')->name('app.vendor.add');
    Route::post('/vendor/add', 'App\Http\Controllers\VendorController@add')->name('app.vendor.add');
    Route::get('/vendor/edit/{id}/{msg?}', 'App\Http\Controllers\VendorController@edit')->name('app.vendor.edit');
    Route::get('/vendor/delete/{id}', 'App\Http\Controllers\VendorController@delete')->name('app.vendor.delete');

    //product
    Route::resource('product', ProductController::class);
    Route::resource('product-detail', ProductDetailController::class);

    Route::resource('customer', CustomerController::class);
    Route::resource('order', OrderController::class);
    //Route::resource('order-product', OrderProductController::class);

    Route::get('order-product/create/{order}', 'App\Http\Controllers\OrderProductController@create')->name('order-product.create');
    Route::post('order-product/store/{order}', 'App\Http\Controllers\OrderProductController@store')->name('order-product.store');
    Route::delete('order-product.destroy/{orderProduct}/{order_id}','App\Http\Controllers\OrderProductController@destroy' )->name('order-product.destroy');
});

Route::get('/test/{p1}/{p2}', 'App\Http\Controllers\TestController@test')->name('test');



Route::fallback(function() {
    echo 'This route was not found. <a href="'.route('site.index').'">Click here</a> to return to the main page';
});
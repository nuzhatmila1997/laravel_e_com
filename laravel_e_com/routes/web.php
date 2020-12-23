<?php

use App\Http\Controllers\FrontProductListController;
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

Route::get('/','FrontProductListController@index');
Route::get('/product/{id}','FrontProductListController@show')->name('product.view');
Route::get('category/{name}','FrontProductListController@allProducts')->name('product.list');
Route::get('/addToCart/{product}','CartController@addToCart')->name('cart.add');
Route::get('/cart','CartController@showCart')->name('cart.show');
Route::post('/products/{product}','CartController@updateCart')->name('cart.update');
Route::post('/product/{product}','CartController@removeCart')->name('cart.remove');
Route::get('/orders','CartController@order')->name('order')->middleware('auth');
Route::get('all/products','FrontProductListController@moreProducts')->name('more.product');

Route::get('/index/test', function () {
    return view('test');
});
// SSLCOMMERZ Start
Route::get('/checkout/{amount}', 'SslCommerzPaymentController@exampleEasyCheckout')->name('cart.checkout')->middleware('auth');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success','SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController::class@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'auth','middleware'=>['auth','isAdmin']],function(){
    Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
    Route::resource('category', 'CategoryController');
    Route::resource('subcategory', 'SubcategoryController');
    Route::resource('product', 'ProductController');
    Route::get('subcatories/{id}','ProductController@loadSubCategories');
    Route::get('slider/create','SliderController@create')->name('slider.create');
	Route::get('slider','SliderController@index')->name('slider.index');
    Route::post('slider','SliderController@store')->name('slider.store');
    Route::delete('slider/{id}','SliderController@destroy')->name('slider.destroy');
    Route::get('users','UserController@index')->name('user.index');
    Route::get('orders','CartController@userOrder')->name('order.index');
    Route::get('/orders/{orderid}','CartController@viewUserOrder')->name('user.order');

});


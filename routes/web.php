<?php

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

Route::get('/', 'FrontendController@index');

Route::get('/product/{id}', 'FrontendController@product');

Route::get('/product_detail/{id}', 'FrontendController@product_detail');

Route::get('/add_cart', 'FrontendController@addCart');

Route::get('/showShoppingCartCount', 'FrontendController@showCartCount');

Route::get('/showShoppingCartview', 'FrontendController@view');

Route::post('/shoppingCartdelete', 'FrontendController@trash');

Route::get('/shoppingCartUpdate/{rawId}/{qty}', 'FrontendController@update');

Route::get('/showCheckoutview', 'FrontendController@checkoutView');

Route::post('/placeOrder', 'FrontendController@placeOrder');

Route::get('/user_login','FrontendController@userLogin');
Route::post('/user','FrontendController@login');
Route::get('/user_register','FrontendController@userRegister');
Route::post('/registercheck','FrontendController@register');
Route::get('/user_logout','FrontendController@logout');


Route::get('/check_user','FrontendController@checkUser');


Route::get('/clear',function(){
    Artisan::call("cache:clear");
    Artisan::call("config:cache");
    Artisan::call("route:clear");
    Artisan::call("view:clear");
    echo "<h3> Cache Cleared </h3>";
    });

Route::get('/home', 'HomeController@index')->name('home');

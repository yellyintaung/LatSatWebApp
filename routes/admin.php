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

Route::group(['middleware' => ['auth']], function () {
Route::get('/admin', function()
    {
        return view('la.dashboard.index');
    });
    
    Route::resource('/admin/category', 'Admin\CategoryController');
    
    Route::resource('/admin/type', 'Admin\TypeController');
    
    Route::resource('/admin/product', 'Admin\ProductController');
    
    Route::resource('/admin/customer', 'Admin\CustomerController');
    
    Route::resource('/admin/order', 'Admin\OrderController');
    
    Route::resource('/admin/payment', 'Admin\PaymentController');
});

Auth::routes();

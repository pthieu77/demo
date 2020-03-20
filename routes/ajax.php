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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Auth\User', 'prefix' => 'user'], function () {
    Route::post('/login', 'LoginController@post_login')->name('ajax.user.auth.login');

    Route::post('/register', 'RegisterController@post_register')->name('ajax.user.auth.register');

    Route::post('/forgot-password', 'ForgotPasswordController@post_forgot_password')->name('ajax.user.auth.forgot.password');

    Route::post('/reset-password', 'ResetPasswordController@post_reset_password')->name('ajax.user.auth.reset.password');
});

Route::group(['middleware' => ['auth.user'], 'namespace' => 'Auth\User', 'prefix' => 'user'], function () {
    Route::post('/logout', 'LoginController@post_logout')->name('ajax.user.auth.logout');
});

Route::group(['namespace' => 'Auth\Admin', 'prefix' => 'admin'], function () {
    Route::post('/login', 'LoginController@post_login')->name('ajax.admin.auth.login');
});

Route::group(['middleware' => ['auth.admin'], 'namespace' => 'Auth\Admin', 'prefix' => 'admin'], function () {
    Route::post('/logout', 'LoginController@post_logout')->name('ajax.admin.auth.logout');
});

Route::group(['middleware' => ['auth.admin'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
	
	Route::group(['namespace' => 'Product', 'prefix' => 'product'], function () {
	    Route::post('/add-product', 'AjaxController@post_product')->name('ajax.admin.product.post');
	});
    
});

Route::group(['middleware' => ['auth.admin'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Product', 'prefix' => 'product'], function () {
        Route::get('/datatables', 'AjaxController@get_datatables')->name('ajax.admin.product.datatables');

        Route::post('/update', 'AjaxController@post_product')->name('ajax.admin.product.update');

        Route::get('/detail', 'AjaxController@get_product_detail')->name('ajax.admin.product.detail');

        Route::delete('/delete', 'AjaxController@delete_product')->name('ajax.admin.product.delete');
    });

    Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard'], function () {
        Route::get('/', 'AjaxController@get_dashboard')->name('ajax.admin.dashboard.get');
    });
});

Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
    Route::get('/get-products', 'Home\AjaxController@get_products')->name('ajax.user.product.get');

    Route::get('/get-product', 'Product\AjaxController@get_product')->name('ajax.user.product.get');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    
});

// Auth::routes();

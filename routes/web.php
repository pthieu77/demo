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

Route::group(['namespace' => 'User'], function () {
    // router of user

    Route::group(['namespace' => 'Home'], function () {
        Route::get('/', 'WebController@index')->name('user.page.home.index');
    });

    Route::group(['namespace' => 'Product'], function () {
        Route::get('/product', 'WebController@index')->name('user.page.product.index');
    });

    
});

Route::group(['namespace' => 'Auth'], function () {
    // router of admin
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::get('/login', 'LoginController@login')->name('admin.page.auth.login');
    });

    // router of user
    Route::group(['namespace' => 'User'], function () {
        Route::get('/login', 'LoginController@login')->name('user.page.auth.login');
    });

    Route::group(['namespace' => 'User'], function () {
        Route::get('/register', 'RegisterController@register')->name('user.page.auth.register');
    });

    Route::group(['namespace' => 'User'], function () {
        Route::get('/forgot-password', 'ForgotPasswordController@forgot_password')->name('user.page.auth.forgot.password');
    });

    Route::group(['namespace' => 'User'], function () {
        Route::get('/reset-password', 'ResetPasswordController@reset_password')->name('user.page.auth.reset.password');
    });
});

Route::group(['middleware' => ['auth.user'], 'namespace' => 'User'], function () {
    // router of admin
    
    Route::group(['namespace' => 'Account', 'prefix' => 'account'], function () {
        Route::get('/', 'WebController@index')->name('user.page.account.index');
    });
});

Route::group(['middleware' => ['auth.admin'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    // router of admin
    
    Route::get('/', 'Dashboard\WebController@index')->name('admin.page.index');
    
    Route::group(['namespace' => 'Product', 'prefix' => 'product'], function () {
        Route::get('/', 'WebController@index')->name('admin.page.product.index');
    });

    Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard'], function () {
        Route::get('/', 'WebController@index')->name('admin.page.dashboard.index');
    });

    Route::group(['namespace' => 'Account', 'prefix' => 'account'], function () {
        Route::get('/', 'WebController@index')->name('admin.page.account.index');
    });

    Route::group(['namespace' => 'Errors', 'prefix' => 'errors'], function () {
        Route::get('/403', 'WebController@page_403')->name('admin.page.errors.403');

        Route::get('/404', 'WebController@page_404')->name('admin.page.errors.404');

        Route::get('/500', 'WebController@page_500')->name('admin.page.errors.500');
    });
});

// Auth::routes();

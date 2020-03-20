<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Auth\API'], function () {
    Route::post('/login', 'LoginController@login')->name('api.auth.login');
});

Route::group(['middleware' => ['auth.api'], 'namespace' => 'Auth\API'], function () {
    Route::post('/logout', 'LoginController@logout')->name('api.auth.logout');
});

Route::group(['middleware' => ['auth.api'], 'namespace' => 'API'], function () {
    Route::group(['namespace' => 'Product', 'prefix' => 'product'], function () {
        Route::get('/', 'APIController@get_products')->name('api.admin.products');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

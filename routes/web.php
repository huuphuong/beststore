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

Route::group(['prefix' => 'admin'], function() {
    Route::get('start', function () {
    	return view('start');
    });
});


Route::get('/', [
	'as' => 'index',
	'uses' => 'Frontend\IndexController@index'
]);

Route::get('{slug}-{product_id}.html', [
	'as' => 'site.product.detail',
	'uses' => 'Frontend\ProductController@index'
]);

Route::get('/login', 'LoginController@index');

Route::get('{all}', function () {
	return view('start');
})->where(['all' => '.*']);

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

Route::post('/products/upload', 'ProductController@upload');

Route::get('/', [
	'as' => 'index',
	'uses' => 'Frontend\IndexController@index'
]);

Route::post('/subscribe', [
    'as' => 'index.subscribe',
    'uses' => 'Frontend\IndexController@subscribe'
]);

Route::get('{slug}-{product_id}.html', [
	'as' => 'site.product.detail',
	'uses' => 'Frontend\ProductController@index'
]);

Route::post('/register', 'LoginController@register');
Route::post('/signin', 'LoginController@signin');

Route::get('/login', ['as' => 'site.login', 'uses' => 'LoginController@index']);
Route::post('/login', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@signout');

Route::post('/addtocart', [
	'as' => 'cart.add',
	'uses' => 'Frontend\CartController@addToCart'
]);

Route::delete('/removecart', [
	'as' => 'cart.remove',
	'uses' => 'Frontend\CartController@destroyCart'
]);

Route::get('{category}', [
	'as' => 'site.category',
	'uses' => 'Frontend\CategoryController@categories'
]);

Route::get('{all}', function () {
	return view('start');
})->where(['all' => '.*']);

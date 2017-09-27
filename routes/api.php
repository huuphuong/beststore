<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => 'v1'], function() {
	Route::resource('categories', 'CategoryController');
	Route::resource('colors', 'ColorController');
	Route::resource('sizes', 'SizeController');
	Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('vendors', 'VendorController');
    Route::resource('products', 'ProductController');
    Route::post('/products/upload', 'ProductController@upload');
    Route::resource('product-image', 'ProductImageController');
});


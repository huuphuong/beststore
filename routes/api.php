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
	Route::resource('components', 'ComponentController');
	Route::get('/categories/positions', 'CategoryController@countPosition');
	Route::get('/categories/list', 'CategoryController@getList');
	Route::resource('categories', 'CategoryController');
	Route::resource('colors', 'ColorController');
	Route::resource('sizes', 'SizeController');
	Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('vendors', 'VendorController');
    Route::resource('products', 'ProductController');
    Route::post('/products/upload', 'ProductController@upload');
    Route::resource('product-image', 'ProductImageController');
    Route::resource('product-groups', 'ProductGroupController');
    Route::get('/contains_product', 'ProductCollectionController@productOfCollection');
    Route::post('/collection/position', 'ProductCollectionController@updatePosition');
    Route::delete('/collection/remove/{product_id}', 'ProductCollectionController@removeProduct');
    Route::resource('product-collections', 'ProductCollectionController');
    Route::resource('settings', 'SettingController');
    Route::resource('slideshows', 'SlideshowController');
    Route::resource('tutorials', 'TutorialController');
    Route::get('navigations/parents', 'NavigationController@getParents');
    Route::resource('navigations', 'NavigationController');
});


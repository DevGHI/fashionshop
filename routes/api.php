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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::post('maincategories','MainCategoryController@store');
    Route::post('maincategories/update/{id}','MainCategoryController@update');
    Route::delete('maincategories/{id}','MainCategoryController@destroy');
    
    Route::post('townships/update/{id}','TownshipController@update');   
    Route::post('townships','TownshipController@store');
    Route::delete('townships/{id}','TownshipController@destroy');

    

});
Route::post('order_report','OrderController@order_report');

Route::post('user_report','OrderController@user_report');


Route::get('townships','TownshipController@index');
Route::get('townships/{id}','TownshipController@show');

Route::get('maincategories','MainCategoryController@index');
Route::get('maincategories/{id}','MainCategoryController@show');

Route::apiResource('colors', 'ColorController')->except('update'); 
Route::post('colors/update/{id}','ColorController@update');
Route::apiResource('sizes', 'SizeController')->except('update'); 
Route::post('sizes/update/{id}','SizeController@update');

Route::apiResource('suppliers', 'SupplierController')->except('update'); 
Route::post('suppliers/update/{id}','SupplierController@update');



Route::apiResource('subcategories','SubCategoryController')->except('update');
Route::post('subcategories/update/{id}','SubCategoryController@update');//->middleware('auth:api');

Route::get('/products/','ProductController@index');
Route::get('/products/{id}','ProductController@show');
Route::delete('/products/{id}','ProductController@destroy');
Route::post('/products','ProductController@store')->middleware('auth:api');
Route::post('/products/update/{id}','ProductController@update')->middleware('auth:api');
//Route::post('/products/{id}','ProductController@destroy')->middleware('auth:api');

//Route::apiResource('productphotos', 'ProductPhotoController')->except('update');


Route::apiResource('orders', 'OrderController')->except('update')->middleware('api');
Route::post('orders/update/{id}','OrderController@update')->middleware('api');


Route::apiResource('users', 'UserController')->except('update');
Route::post('users/update/{id}','UserController@update');

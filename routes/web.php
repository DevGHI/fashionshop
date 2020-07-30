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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('api/win','Controller@login');
// Route::post('api/win',function(){
//     return 'fuck';
// });

Route::get('/home', 'HomeController@index')->name('home');

Route::post('api/register','Controller@user_register');

Route::get('api/products/category/{subcategory_id}','ProductController@subcategory_product');




//admin dashboard route

Route::get('/login', function () {
    return view('auth.login');
});

Route::middleware(['checktoken'])->group(function () {

Route::get('/dashboard',function(){
    return view('admin.dashboard');
});

Route::get('/township', 'AdminController@index');
Route::get('/color', 'AdminController@color');
Route::get('/size', 'AdminController@size');
Route::get('/supplier', 'AdminController@supplier');
Route::get('/product', 'AdminController@product');
Route::get('/customer', 'AdminController@user');
Route::get('/order', 'AdminController@order');
Route::get('/total_order', 'AdminController@total_order');
Route::get('/main_category', 'AdminController@main_category');
Route::get('/product_detail/{id}', 'AdminController@product_detail');
Route::get('/order_detail/{id}', 'AdminController@order_detail');

});

// ##########Web site UI###########
Route::get('/','Controller@home');
Route::get('/category/{subcategory_id}','Controller@category_product');
Route::get('/product/{id}','Controller@product_detail');
Route::get('/contact','Controller@contact');
Route::get('/checkout','Controller@checkout');
Route::get('/user/login','Controller@login_page');
Route::get('/user/register','Controller@register_page');
Route::post('api/cart_detail','Controller@cart_detail');
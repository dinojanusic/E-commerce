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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('product/admin', 'ProductController@admin');
Route::get('product/create', 'ProductController@create')->middleware('auth');
Route::get('product/edit{$id}', 'ProductController@edit')->middleware('auth');
Route::get('product/index', 'ProductController@index');
Route::get('product/show', 'ProductController@show');
Route::get('product/cart', 'ProductController@cart')->middleware('auth');
Route::get('add-to-cart/{id}', 'ProductController@addToCart')->middleware('auth');
Route::get('product/games', 'ProductController@product_games');
Route::get('product/laptops', 'ProductController@product_laptops');
Route::get('product/tv', 'ProductController@product_tv');

Route::get('/admin', ['middleware' => 'admin', function () {
    //
}]);

Route::get('user/index', 'UserController@index');


Route::patch('update-cart', 'ProductController@updatecart')->middleware('auth');
Route::delete('remove-from-cart', 'ProductController@remove')->middleware('auth');

Route::resource('product', 'ProductController');
Route::resource('users', 'UserController');

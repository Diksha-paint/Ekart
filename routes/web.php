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

Route::resource('categories', 'CategoriesController');
Route::resource('products', 'ProductsController');
Route::get('/', 'BlogControllers@index')->name('welcome');
Route::resource('carts', 'CartsController');
Route::get('carts/{id}/{quantity}/up', 'CartsController@up')->name('carts.up');
Route::get('carts/{id}/{quantity}/down', 'CartsController@down')->name('carts.down');
Route::resource('products/{product}/reviews', 'ReviewsController');
Route::resource('checkout', 'CheckoutController');
Route::get('thanks', 'CheckoutController@thanks')->name('thanks');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



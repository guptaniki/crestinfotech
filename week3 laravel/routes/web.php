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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/productlist', 'HomeController@productlist')->name('productlist');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/productsingle', 'HomeController@productsingle')->name('productsingle');


Route::get('/cart', 'HomeController@cart')->name('cart');
Route::get('add-to-cart/{id}', 'HomeController@addToCart');
Route::patch('update-cart', 'HomeController@update');
Route::delete('remove-from-cart', 'HomeController@remove');
Route::resource('category','CategoryController')->middleware('auth');
Route::resource('product','ProductController')->middleware('auth');


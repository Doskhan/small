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


Auth::routes();

Route::get('/home', 'OrdersController@index')->name('home');
Route::get('/order/create', 'OrdersController@create');
Route::get('/order/{id}', 'OrdersController@show');
Route::post('/store', 'OrdersController@store');
Route::get('/', 'OrdersController@index')->name('home')->middleware();

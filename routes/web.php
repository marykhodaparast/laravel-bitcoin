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

Route::get('/', 'currencyController@allCurrency')->name('welcome');
Route::get('/mine-profit', 'currencyController@mineProfit')->name('mine-profit');
Route::get('/request-and-insert', 'currencyController@index')->name('requestAndInsert');
Route::get('/test2', 'currencyController@index2')->name('test2');
Route::post('/ajax', 'currencyController@ajaxResponse')->name('ajaxResponse');
Route::post('/ajax-mining','currencyController@ajax_mining')->name('ajax-mining');
Route::get('/test',function(){
   return view('test');
});


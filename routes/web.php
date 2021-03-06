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
//use Illuminate\Routing\Route;

Route::get('/', 'currencyController@allCurrency')->name('welcome');
Route::get('/mine-profit', 'currencyController@mineProfit')->name('mine-profit');
Route::get('/request-and-insert', 'currencyController@index')->name('requestAndInsert');
Route::post('/ajax', 'currencyController@ajaxResponse')->name('ajaxResponse');
Route::post('/ajax-mining','currencyController@ajax_mining')->name('ajax-mining');
Route::get('/test',function(){
   return view('test');
});
Route::get('/cron-currency','currencyController@cronTable')->name('cronTable');
Route::get('/table','currencyController@currencyTable')->name('table');
Route::get('/cron-rial','currencyController@cron_dollarToRial')->name('rial');
Route::post('/ajax-changeCost','CostController@changeCost')->name('changeCost');
Route::post('/ajax-computePowerCost','currencyController@computePowerCost')->name('computePowerCost');
Route::get('/cron-currencies','currencyController@cronTopListCryptoCompare')->name('cronCurrencies');
Route::post('/mine-form','currencyController@mineForm')->name('mineForm');


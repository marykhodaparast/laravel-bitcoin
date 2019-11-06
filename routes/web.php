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

use App\Currency;
use App\Http\Requests\changeCurrencyRequest;

Route::get('/', function () {

    $currencies = Currency::all();
    // $asset_id = Currency::where('asset_id', $request->input('firstSelect'))->first();
    //     $price_usd = $asset_id['price_usd'];
    //     $asset_id2 = Currency::where('asset_id', $request->input('secondSelect'))->first();
    //     $price_usd2 = $asset_id2['price_usd'];
    return view('welcome')->with([
        'currencies'=>$currencies,
        // 'asset_id'=>$asset_id,
        // 'price_usd'=>$price_usd,
        // 'asset_id2'=>$asset_id2,
        // 'price_usd2'=>$price_usd2
    ]);
});

Route::get('/test','currencyController@index')->name('test');
Route::get('/test2','currencyController@index2')->name('test2');
//Route::post('/ajax','currencyController@ajaxResponse')->name('ajaxResponse');


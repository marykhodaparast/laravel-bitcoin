<?php

namespace App\Http\Controllers;

use App\Costs;
use App\Http\Requests\changeCurrencyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Currency;
use App\hash_rates;

class currencyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [
            'start' => '1',
            'limit' => '40',
            'convert' => 'USD'
        ];

        $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: 99e000bd-935b-48b7-ac3d-d981e4b37a47'
        ];
        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $headers,     // set the headers
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        //print_r(json_decode($response)); // print json decoded response
        $objs = json_decode($response, true);
        //print_r($data["name"]);
        curl_close($curl); // Close request

        foreach ($objs["data"] as $obj) {

            Currency::updateOrInsert(
                [
                    'name' => $obj["name"],
                    'symbol' => $obj["symbol"],
                    'price' => $obj["quote"]["USD"]["price"],
                    'volume_24h' => $obj["quote"]["USD"]["volume_24h"],
                    'percent_change_24h' => $obj["quote"]["USD"]["percent_change_24h"],
                    'percent_change_7d' => $obj["quote"]["USD"]["percent_change_7d"],
                    'market_cap' => $obj["quote"]["USD"]["market_cap"],
                    'priority'=>5,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
        DB::table('currencies')->updateOrInsert(
            [
                'name' => "USD",
            ],
            [
                'symbol' => "USD",
                'price' => "1",
                'volume_24h' => 1024.02,
                'percent_change_24h' => 1024.02,
                'percent_change_7d' => 1024.02,
                'priority'=>5,
                'market_cap' => 1024.02,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        exit;
        // dd("Finished adding data in currencies table");
        // $minutes = 10;
        // $value = Cache::remember('currencies', $minutes, function () {
        //     return DB::table('currencies')->get();
        // });
    }

    public function allCurrency()
    {
        $currencies = Currency::OrderBy('priority', 'ASC')->get();
        return view('welcome')->with([
            'currencies' => $currencies,
        ]);
    }

    /***
     * ajax response
     */
    public function ajaxResponse(changeCurrencyRequest $request)
    {
        $data = array();
        $data['first'] = $request->input('first');
        $data['firstSelect'] = $request->input('second');
        $data['secondSelect'] = $request->input('third');

        $asset_id = Currency::where('symbol', $data['firstSelect'])->first();
        $price_usd = $asset_id['price'];
        $asset_id2 = Currency::where('symbol', $data['secondSelect'])->first();
        $price_usd2 = $asset_id2['price'];
        $x = 0;
        if ($price_usd2 != 0) {
            $x = ($price_usd * $data['first']) / $price_usd2;
        }

        return number_format((float)$x,2,'.','');
    }
    public function ajax_mining()
    { }

    public function mineProfit()
    {
        $currencies = Currency::OrderBy('priority', 'ASC')->get();
        $costs = Costs::all();
        $hash_rates = hash_rates::all();
        return view('mineProft')->with([
            'currencies' => $currencies,
            'costs' => $costs,
            'hash_rates' => $hash_rates
        ]);
    }

    public function currencyTable()
    {
        return view('currencyTable');
    }

    public function cronTable()
    { }
}

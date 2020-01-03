<?php

namespace App\Http\Controllers;

use App\Costs;
use App\Http\Requests\changeCurrencyRequest;
use Illuminate\Support\Facades\DB;
use App\Currency;
use App\hash_rates;
use App\Http\Requests\computePowerCostRequest;
use Illuminate\Http\Request;

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
            'limit' => '2500',
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
        $objs = json_decode($response, true);
        curl_close($curl); // Close request

        $i=0;
        foreach ($objs["data"] as $obj) {

            DB::table('currencies')->where('id',$i+1)->update(
                [
                    'volume_24h' => $obj["quote"]["USD"]["volume_24h"],
                    'percent_change_24h' => $obj["quote"]["USD"]["percent_change_24h"],
                    'percent_change_7d' => $obj["quote"]["USD"]["percent_change_7d"],
                    'market_cap' => $obj["quote"]["USD"]["market_cap"],
                    'priority'=>5
                ]
            );
            $i++;
        }

        dd("Finished adding data in currencies table");

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

        return number_format((float) $x, 2, '.', '');
    }
    public function ajax_mining()
    {
    }

    public function mineProfit()
    {
        $currencies = Currency::all();
        $costs = Costs::all();
        $hash_rates = hash_rates::all();
        $rial = DB::table('setting')->select('number as num')->where('name', '=', 'dollar')->first();
        // dd($request);
        //$data['coin']= $request->input('coin');
       // dd($request->coin);

        return view('mineProft')->with([
            'currencies' => $currencies,
            'costs' => $costs,
            'hash_rates' => $hash_rates,
            'rial' => number_format(intval(str_replace(',','',$rial->num)/10))
        ]);
    }
    public function postMineProfit(Request $request)
    {

    }

    public function currencyTable()
    {
        $currencies = Currency::where('name', '!=', 'USD')->paginate(50);
        $rial = DB::table('setting')->select('number as num')->where('name', '=', 'dollar')->first();
        $i = 1;
        $toman = (float) str_replace(',', '', $rial->num) / 10;
        return view('currencyTable')->with([
            'currencies' => $currencies,
            'i' => $i,
            'toman' => $toman
        ]);
    }

    public function cron_dollarToRial()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.tgju.online/v1/data/sana/json",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Accept-Encoding: gzip, deflate",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Host: api.tgju.online",
                "Postman-Token: fca03fbd-aac9-463b-83b5-44f4ee62d032,c9f13c25-4215-4137-8640-5cd8e1ff7dc3",
                "User-Agent: PostmanRuntime/7.19.0",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $obj = json_decode($response, true);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // print_r($obj['sana_buy_usd']['p']);
        }
        DB::table('setting')->updateOrInsert([
            'name' => 'dollar',
            'number' => $obj['sana_buy_usd']['p'],
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function cronTable()
    {
    }
    public function cronTopListCryptoCompare()
    {
        $url = 'https://min-api.cryptocompare.com/data/top/mktcapfull';
        $parameters = [
            'tsym' => 'USD',
            'limit' => '100',
        ];

        $headers = [
            //'Accepts: application/json',
            'APIKEY: 471b343dc1f3c950e0d1847d1c529352fa684a5c54250f4e8ee8d8f0be7ee466'
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
        $i = 0;
        //print_r($objs['Data'][strval($i)]['CoinInfo']['Algorithm']);
        curl_close($curl); // Close request

        for ($i = 0; $i < 100; $i++) {
            Currency::updateOrInsert([
                'id' => $i+1,
                'price' => $objs['Data'][strval($i)]['RAW']['USD']['PRICE'],
                'Name' => $objs['Data'][strval($i)]['CoinInfo']['FullName'],
                'symbol' => $objs['Data'][strval($i)]['CoinInfo']['Name'],
                'Algorithm' => $objs['Data'][strval($i)]['CoinInfo']['Algorithm'],
                'NetHashesPerSecond' => $objs['Data'][strval($i)]['CoinInfo']['NetHashesPerSecond'],
                'BlockTime' => $objs['Data'][strval($i)]['CoinInfo']['BlockTime'],
                'BlockReward' => $objs['Data'][strval($i)]['CoinInfo']['BlockReward'],
                'priority' => 5,
                'created_at'=> now(),
                'updated_at'=> now()
            ]);
        }
        DB::table('currencies')->updateOrInsert(
            [
                'name' => "USD",
                'symbol' => "USD",
                'price' => "1",
                'priority'=>'1',
                'volume_24h' => 1024.02,
                'percent_change_24h' => 1024.02,
                'percent_change_7d' => 1024.02,
                'market_cap' => 1024.02,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        dd("Finished adding data in currencies table");
    }


    public function computePowerCost(computePowerCostRequest $request)
    {
        $data = array();
        $data['cost'] = $request->cost;
        $data['power'] = $request->power;
        $output = (30 * 24 * $data['cost'] * $data['power']) / 1000;
        return number_format((float) $output, 2, '.', '');
    }
    public function mineForm(Request $request)
    {
        $data = array();
        $data['coin'] = $request->coin;
        $data['hashrate'] = $request->hashrate;
        $data['power'] = $request->power;
        $data['cost'] = $request->cost;
        $data['wage'] = $request->wage;
        $data['hash_rates'] = $request->hash_rates;
        return $data;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\changeCurrencyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Currency;

class currencyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ini_set('max_execution_time', 300);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?limit=5000",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 100,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Accept-Encoding: gzip, deflate",
                "Accepts: application/json",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Cookie: __cfduid=da3430ecdf21bc6355bfb6941c2a2134d1572972856",
                "Host: pro-api.coinmarketcap.com",
                "Postman-Token: 28159acf-60fb-4df2-8c52-33eb6efca766,f714bf7c-69ec-4173-a17d-3607108318d8",
                "User-Agent: PostmanRuntime/7.19.0",
                "X-CMC_PRO_API_KEY: 6ac208b2-ba83-40b2-8d96-e33b162c0cc0",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo "done";
        }

        $json = $response;
        $objs = json_decode($json, true);
        foreach ($objs["data"] as $obj) {
            DB::table('currencies')->updateOrInsert(
                [
                    'id' => $obj["id"],
                ],
                [
                    'name' => $obj["name"],
                    'symbol' => $obj["symbol"],
                    'price' => $obj["quote"]["USD"]["price"],
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
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        exit;
        dd("Finished adding data in currencies table");
        if ($err) {
            return  "cURL Error #:" . $err;
        } else {
            $json =   $response;
        }
        // $minutes = 10;
        // $value = Cache::remember('currencies', $minutes, function () {
        //     return DB::table('currencies')->get();
        // });
    }

    public function allCurrency()
    {
        $currencies = Currency::OrderBy('priority','ASC')->get();
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

        return $x;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function mineProfit()
    {
        $currencies = Currency::all();
        return view('mineProft')->with([
            'currencies'=>$currencies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

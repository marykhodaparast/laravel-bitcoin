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
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://rest.coinapi.io/v1/assets",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "APIKEY: AEDCFEEA-5C75-4939-9E4A-D80FF5ADE942",
                "Accept: */*",
                "Accept-Encoding: gzip, deflate",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Host: rest.coinapi.io",
                "Postman-Token: 5fc2da9a-333f-4052-a356-a3a1635f8fbe,6c515533-3d6c-4605-b3a1-ed1af7cd8495",
                "User-Agent: PostmanRuntime/7.17.1",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        //return $response;
        $err = curl_error($curl);

        curl_close($curl);

        $json = $response;
        $objs = json_decode($json, true);
        foreach ($objs as $obj) {
            foreach ($obj as $key => $value) {
                $insertArr[str_slug($key, '_')] = $value;
            }
            DB::table('currencies')->insert($insertArr);
        }
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

    /***
     * ajax response
     */
    public function ajaxResponse(changeCurrencyRequest $request)
    {
        $data = array();
        $data['first'] = $request->input('first');
        $data['firstSelect'] = $request->input('second');
        $data['secondSelect'] = $request->input('third');

        $asset_id = Currency::where('asset_id', $data['firstSelect'])->first();
        $price_usd = $asset_id['price_usd'];
        $asset_id2 = Currency::where('asset_id', $data['secondSelect'])->first();
        $price_usd2 = $asset_id2['price_usd'];
        $data['secondSelect'] = ($price_usd2 * $data['first']) / $price_usd;
        $x = $data['secondSelect'];

        return $data['secondSelect'];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

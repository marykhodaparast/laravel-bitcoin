<?php

namespace App\Http\Controllers;

use App\Http\Requests\changeCostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeCost(changeCostRequest $request)
    {
         $data = array();
         $data['costPer'] = $request->costPer;
         $price = DB::table('costs')->select('price as p')->where('name',$data['costPer'])->first();
         return $price->p;
    }


}

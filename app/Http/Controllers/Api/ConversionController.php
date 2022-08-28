<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pair;
use App\Models\Conversion;

class ConversionController extends Controller
{
    //

    public function conversion(Request $request){
        $pair = Pair::where('currency_start', $request->currency_start)->where('currency_end', $request->currency_end)->first();

        if($pair){
            $conversion = floatval($pair->rate) * floatval($request->amount);
            return response()->json([
                "status" => "201",
                "currency_start"=>$request->currency_start,
                "currency_end"=>$request->currency_end,
                "rate" => $pair->rate,
                "amount_conversion" => $conversion
            ]);

            Conversion::create([
                "pair_id" => $pair->id,
                "amount" => $conversion
            ]);
        }

        

    }
}

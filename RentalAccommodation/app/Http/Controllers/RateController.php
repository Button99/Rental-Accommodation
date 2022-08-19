<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Rate;
use Illuminate\Http\Response;


class RateController extends Controller
{
    public function addRate($id, Request $request) {
        $validated= Validator::make($request->all(), [
            'rate' => ['required', 'integer', 'between:1,5']
        ]);

        if(!$validated->fails()) {
            $rate= Rate::where('accommodation_id', $id)->first();
            
            $rate->counter+=1;
            
            $newTotalRate= $rate->total_rate_value / $rate->counter;

            $update= $rate->update([
                'rate' => $newTotalRate
            ]);

            if($update) {
                return response()->json('Rate has been updated!', Response::HTTP_ACCEPTED);
            }
        }

        return response()->json('Failed', Response::HTTP_FORBIDDEN);
    }

    public function show($id) {
        $rate= Rate::where('accommodation_id', $id)->first();

        if($rate) {
            return response()->json($rate->rate, Response::HTTP_ACCEPTED);
        }

        return response()->json('Error', Response::HTTP_NO_CONTENT);
    }    
}

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
            $rate= Rate::where('accommodation_id', $id);

            $rate->count+=1;
            
            $newRate= $rate / $rate->count; // ?? Check this tomorrow 19/8 need find the average and add the new rate

            $update= $rate->update([
                'rate' => $request->rate
            ]);

            if($update) {
                return response()->json('Rate has been updated!', Response::HTTP_ACCEPTED);
            }
        }

        return response()->json('Failed', Response::HTTP_FORBIDDEN);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Rate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function addRate($id, Request $request) {
        $validated= Validator::make($request->all(), [
            'rate' => ['required', 'integer', 'between:1,5']
        ]);

        if(!$validated->fails()) {
            $rate= Rate::where('accommodation_id', $id)->where('user_id', Auth::user()->id)->first();
            
            if($rate) {
                $update= $rate->update([
                    'rate' => $request->rate,
                ]);
                
                if($update) {
                    return response()->json('Rate has been updated!', Response::HTTP_ACCEPTED);
                }
            }
            
            else {
                $create= Rate::create([
                    'rate' => $request->rate,
                    'user_id' => Auth::user()->id,
                    'accommodation_id' => $id
                ]);

                if($create) {
                    return response()->json('Rate has been created', Response::HTTP_ACCEPTED);
                }
            }
        }

        return response()->json('Failed', Response::HTTP_FORBIDDEN);
    }

    public function show($id) {
        $rate= Rate::where('accommodation_id', $id)->avg('rate');

        if($rate) {
            return response()->json($rate, Response::HTTP_ACCEPTED);
        }

        return response()->json('Error', Response::HTTP_NO_CONTENT);
    }    
}

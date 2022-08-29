<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Accommodation;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function getLocation(Request $request) {
        $validated= Validator::make($request->all(), [
            'location' => ['required', 'max:30']
        ]);

        if($validated->fails()) {
            $location= Accommodation::select('town')->where('town', 'LIKE', $request->location .'%')->distinct()->get();
            return response()->json(['Location'=> $location], Response::HTTP_OK);

        }
        return response()->json('Error finding locations', Response::HTTP_CONFLICT);
    }
}

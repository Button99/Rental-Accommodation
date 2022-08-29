<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Accommodation;

class LocationController extends Controller
{
    public function getLocation(Request $request) {
        $location= Accommodation::select('town')->where('town', 'LIKE', $request->location .'%')->distinct()->get();

        return response()->json(['Location'=> $location], Response::HTTP_ACCEPTED);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;

class VerificationController extends Controller
{

    public function index($vkey) {
        $user= User::where('vkey', '=', $vkey)->first();
        if($user->is_valid == 0) {
            $user->is_valid= 1;
            $user->save();
            return response()->json('User is verified', Response::HTTP_ACCEPTED);
        }

        return response()->json('User is already verified', Response::HTTP_FORBIDDEN);
    }
}

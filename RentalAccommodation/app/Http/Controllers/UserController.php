<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class UserController extends Controller
{
    

    public function delete($id) {
        $user= Auth::user();
        
        if($user->id == $id) {
            if($user->delete()) {
                return response()->json('User Deleted!', Response::HTTP_ACCEPTED);
            }
        }

        return response()->json('Cant be deleted!', Response::HTTP_FORBIDDEN);

    }
}

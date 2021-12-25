<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function changeUserData($id, Request $request) {
        $validated= Validator::make($request->all(), [
            'first_name' => ['required', 'max:40'],
            'last_name' => ['required', 'max:40'],
            'date_of_birth' => ['required', 'date'],
            'email' => ['required', 'email'],
            'gender' => ['required', Rule::in([
                'Male',
                'Female',
                'Non binary'
            ])],
            'phone' => ['required', 'max:20', 'between:7,15']
            ]);

            if(!$validated->fails()) {
                $user= User::find($id);

                if($user) {
                    $updated= $user->update([
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'date_of_birth' => $request->date_of_birth,
                        'email' => $request->email,
                        'gender' => $request->gender,
                        'phone' => $request->phone
                    ]);

                    if($updated) {
                        return response()->json('Updated!', Response::HTTP_ACCEPTED);
                    }
                }

                return response()->json('Forbidden', Response::HTTP_FORBIDDEN);
            }
    }

    public function changePassword($id, Request $request) {
        $validPsw= Validator::make($request->all(), [
            'old_password' => ['required', 'min:8', 'max:40'],
            'new_password' => ['required', 'min:8', 'max:40']
        ]);

        if(!$validPsw->fails()) {
            $user= User::find($id);
            if(Hash::check($request->old_password, $user->password)) {
                $updated= $user->update([
                    'password' => Hash::make($request->new_password)
                ]);

                if($updated) {
                    return response()->json('Password updated!', Response::HTTP_ACCEPTED);
                }
            }
        }
        return response()->json('Error', Response::HTTP_NOT_ACCEPTABLE);
    }
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

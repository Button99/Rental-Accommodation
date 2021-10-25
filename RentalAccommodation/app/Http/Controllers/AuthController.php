<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request) {
        // validate the data for SQL Inj.
        $validated= Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:40'],
        ]);

        // Get from the request the credentials
        $credentials= [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Login function 
        if(!$validated->fails()) {
            if(Auth::attempt($credentials)) {
                return response()->json('Logged in!');
            }
            return response()->json('Wrong email or password');
        }

        return response()->json('Wrong email or password');
    }
    

    public function signup(Request $request) {
        // Validate for possible SQL inj.
        $validated= Validator::make($request->all(), [
            'first_name' => ['required', 'max:40'],
            'last_name' => ['required', 'max:40'],
            'date_of_birth' => ['required', 'date'],
            'password' => ['required', 'min:8', 'max:40'],
            'email' => ['required', 'email'],
            'gender' => ['required', Rule::in([
                'Male',
                'Female',
                'Non binary'
            ])],
            'phone' => ['required', 'max:20', 'between:7,15']
            ]);
        
        // Create user
        if(!$validated->fails()) {
            $user= User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
                'password' =>  Hash::make($request->password),
                'email' => $request->email,
                'gender' => $request->gender,
                'phone' => $request->phone
            ]);
            if($user) {
                return response()->json('User created Successfully');
            }

            return response()->json('Error with db');
        }

        return response()->json('Error with validation!');
    }
}

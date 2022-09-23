<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

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
                $user= Auth::user();
                if ($user->is_valid == 1) {
                    $token= $user->createToken('userToken')->plainTextToken;
                    $res= ['first_name' => $user->first_name,
                        'last_name' => $user->last_name,
                        'token' => $token];
        
                        return response()->json($res, Response::HTTP_ACCEPTED);
                }
                return response()->json('Please verify your email', Response::HTTP_UNAUTHORIZED);
            }
        }

        return response()->json('Wrong email or password', Response::HTTP_NOT_ACCEPTABLE);
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
            'phone' => ['required', 'max:20', 'between:7,15'],
            'accept' => ['required']
            ]);
        
        // Create user
        if(!$validated->fails()) {
            $vkey= md5(time().$request->email);

            $user= User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
                'password' =>  Hash::make($request->password),
                'email' => $request->email,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'vkey' =>  $vkey
            ]);

            if($user) {
                $email= $request->email;
                Mail::raw('Welcome to Rental Accommodation...', function($message) use ($email, $vkey) {
                    $message->from('RentalAccommodations@works.com', 'Rental Accommodation');
                    $message->to($email);
                    $message->subject('Welcome to RentalAccommodation');
                    $message->setBody( 'Helloo');
                    $message->addPart('to activate your account please press the link http://127.0.0.1:8000/verifyEmail?vkey='. $vkey, 'text/plain');
                });

                return response()->json('User created Successfully', Response::HTTP_CREATED);
            }

            return response()->json('Error while creating the user', Response::HTTP_CONFLICT);
        }

        return response()->json('Error with validation!', Response::HTTP_NOT_ACCEPTABLE);
    }

    public function logout(Request $request) {

        if($request->user()->tokens()->delete()) {
            $request->user()->last_login= Carbon::now()->toDateTimeString();
            $request->user()->last_ip= $request->getClientIp();
            $request->user()->save();
            return response()->json('Logged out!', Response::HTTP_OK);
        }
        return response()->json('Error while logging out!', Response::HTTP_UNAUTHORIZED);
    }
}

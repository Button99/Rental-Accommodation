<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

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

    public function changePhone($id, Request $request) {
        $validated= Validator::make($request->all(), [
            'phone' => ['required', 'max:20', 'between:7,15']
        ]);

        if(!$validated->fails()) {
            $user= User::find($id);
            $updated= $user->update([
                'phone' => $request->phone
            ]);

            if($updated) {
                return response()->json('Phone updated', Response::HTTP_ACCEPTED);
            }
        }
        return response()->json('Error', Response::HTTP_FORBIDDEN);
    }

    public function changePassword($id, Request $request) {
        $validPsw= Validator::make($request->all(), [
            'old_password' => ['required', 'min:8', 'max:40'],
            'new_password' => ['required', 'min:8', 'max:40']
        ]);

        if(!$validPsw->fails() & $request->new_password === $request->new_passwordRetype) {
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

    public function forgotPassword(Request $request) {
        $validated= Validator::make($request->all(), [
            'email' => ['required', 'email']
        ]);
        if(!$validated->fails()) {
            $key= md5(time().$request->email);
            $user= User::where('email', $request->email)->firstOrFail();
            $psw_reset= PasswordReset::create([
                'email' => $request->email,
                'token' => $key
            ]);

            $email= $user->email;
            Mail::raw('Welcome to Rental Accommodation...', function($message) use ($email, $key) {
                $message->from('RentalAccommodations@works.com', 'Rental Accommodation');
                $message->to($email);
                $message->subject('Reset Password');
                $message->setBody( 'Helloo');
                $message->addPart('to reset your password please press the link http://127.0.0.1:8000/forgotPassword?key='. $key, 'text/plain');
            });
            return response()->json('OK', Response::HTTP_ACCEPTED);

        }

        return response()->json('NOT OK', Response::HTTP_BAD_REQUEST);
    }

    public function resetPassword(Request $request) {
        $validPsw= Validator::make($request->all(), [
            'password' => ['required', 'min:8', 'max:40']
        ]);

        if(!$validPsw->fails() & $request->password === $request->passwordRetype) {
            $email= PasswordReset::select('email')->where('token', '=', $request->token)->get()->toArray();
            $user= User::where('email', '=', $email)->first();
            $updated= $user->update([
                'password' => Hash::make($request->password)
           ]);

           if($updated) {
            print_r($email[0]['email']);
            Mail::raw('Hello from Rental Accommodation', function($message) use ($email) {
                $message->from('RentalAccommodations@works.com', 'Rental Accommodation');
                $message->to($email[0]['email']);
                $message->subject('Your password has changed!');
                $message->setBody('Helloo');
                $message->addPart('Hello User we inform you that your password has changed.');
            });                
                return response()->json('IT WORKS', Response::HTTP_ACCEPTED);
           }

        }

        return response()->json('It Failed', Response::HTTP_BAD_REQUEST);
    }
}

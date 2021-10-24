<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(Request $request) {
        $validated= $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'max:40', 'min:8']
        ]);

        if($validated) {
            return response()->json('worked');
        }

        return response()->toJson('Error!');
    }

    public function signup(Request $request) {
        $validated= $request->validate([
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
            'phone' => ['required', 'max:20', 'numeric']
        ]);

        if($validated) {
            return response()->json('Worked');
        }

        return response()->toJson('Error with validation!');
    }
}

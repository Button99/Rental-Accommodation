<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AccommodationController extends Controller
{
    public function index() {
        return Accommodation::orderBy('rooms', 'desc')->get();
    }

    public function show($id) {
        return Accommodation::find($id)->get();
    }

    public function create(Request $request) {
        $validated= Validator::make($request->all(), [
            'name' => ['required'],
            'rooms' => ['required', 'integer'],
            'description' => ['required', 'max:300', 'min:3'],
            'town' => ['required', 'max:50', 'min:2'],
            'accommodation_type' => ['required', Rule::in([
                'Apartment',
                'House',
                'Unique space',
                'Boutique Hotel'
            ])]
        ]);

        if(!$validated->fails()) {
            $accommodation= Accommodation::create([
                'name' => $request->name,
                'rooms' => $request->rooms,
                'description' => $request->description,
                'town' => $request->town,
                'accommodation_type' => $request->accommodation_type,
                'user_id' => Auth::user()->id
            ]);

            if($accommodation) {
                return response()->json('Accommodation Created!', Response::HTTP_CREATED);
            }
            
            return response()->json('Accommodation not created!', Response::HTTP_FORBIDDEN);
        }
    }

        public function delete($id) {
            $accommodation= Accommodation::find($id);
            
            if($accommodation->delete()) {
                return response()->json('Accommodation deleted successfully', Response::HTTP_ACCEPTED);
            }

            return response()->json('Error while doing that!', Response::HTTP_FORBIDDEN);
        }

        public function update($id, Request $request) {

            $validated= Validator::make($request->all(), [
                'name' => ['required'],
                'rooms' => ['required', 'integer'],
                'description' => ['required', 'max:300', 'min:3'],
                'town' => ['required', 'max:50', 'min:2'],
                'accommodation_type' => ['required', Rule::in([
                    'Apartment',
                    'House',
                    'Unique space',
                    'Boutique Hotel'
                ])]
            ]);



            if(!$validated->fails()) {
                $accommodation= Accommodation::find($id)->update([
                    'name' => $request->name,
                    'rooms' => $request->rooms,
                    'description' => $request->description,
                    'town' => $request->town,
                    'accommodation_type' => $request->accommodation_type
                ]);
                if($accommodation) {
                    return response()->json('Updated!', Response::HTTP_ACCEPTED);
                }
            }

            return response()->json('Not updated', Response::HTTP_NOT_ACCEPTABLE);
        }
}

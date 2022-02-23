<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Feature;
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
        return Accommodation::find($id);
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
            ])],
            'pool' => ['integer', 'in:0,1'],
            'bbq' => ['integer', 'in:0,1'],
            'wifi' => ['integer', 'in:0,1'],
            'tv' => ['integer', 'in:0,1'],
            'kitchen' => ['integer', 'in:0,1'],
            'parking' => ['integer', 'in:0,1'],
            'air_conditioning' => ['integer', 'in:0,1'],
            'washer' => ['integer', 'in:0,1'],
            'fire_extinguisher' => ['integer', 'in:0,1'],
            'smoke_alarm' => ['integer', 'in:0,1'],
            'hot_tub' => ['integer', 'in:0,1']
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
            
            $features= Feature::create([
                'pool' => $request->pool,
                'bbq' => $request->bbq,
                'wifi' => $request->wifi,
                'tv' => $request->tv,
                'kitchen' => $request->kitchen,
                'parking' => $request->parking,
                'air_conditioning' => $request->air_conditioning,
                'washer' => $request->washer,
                'fire_extinguisher' => $request->fire_extinguisher,
                'smoke_alarm' => $request->smoke_alarm,
                'hot_tub' => $request->hot_tub,
                'accommodation_id' => $accommodation->id
            ]);

            if($accommodation && $features) {
                return response()->json('Accommodation Created!', Response::HTTP_CREATED);
            }
        }
        return response()->json('Accommodation not created!', Response::HTTP_FORBIDDEN);

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
                ])],
                'pool' => ['integer', 'in:1'],
                'bbq' => ['integer', 'in:1'],
                'wifi' => ['integer', 'in:1'],
                'tv' => ['integer', 'in:1'],
                'kitchen' => ['integer', 'in:1'],
                'parking' => ['integer', 'in:1'],
                'air_conditioning' => ['integer', 'in:1'],
                'washer' => ['integer', 'in:1'],
                'fire_extinguisher' => ['integer', 'in:1'],
                'smoke_alarm' => ['integer', 'in:1'],
                'hot_tub' => ['integer', 'in:1']
            ]);

            if(!$validated->fails()) {
                $accommodation= Accommodation::find($id)->update([
                    'name' => $request->name,
                    'rooms' => $request->rooms,
                    'description' => $request->description,
                    'town' => $request->town,
                    'accommodation_type' => $request->accommodation_type
                ]);

                $features= Feature::find($accommodation->id)->update([
                    'pool' => $request->pool,
                    'bbq' => $request->bbq,
                    'wifi' => $request->wifi,
                    'tv' => $request->tv,
                    'kitchen' => $request->kitchen,
                    'parking' => $request->parking,
                    'air_conditioning' => $request->air_conditioning,
                    'washer' => $request->washer,
                    'fire_extinguisher' => $request->fire_extinguisher,
                    'smoke_alarm' => $request->smoke_alarm,
                    'hot_tub' => $request->hot_tub
                ]);
                
                if($accommodation) {
                    return response()->json('Updated!', Response::HTTP_ACCEPTED);
                }
            }

            return response()->json('Not updated', Response::HTTP_NOT_ACCEPTABLE);
        }

        public function showMyAccommodations($id) {
            return Accommodation::where('user_id', '=', $id)->get();
        }
}

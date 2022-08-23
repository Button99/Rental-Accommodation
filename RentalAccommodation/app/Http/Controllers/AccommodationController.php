<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Feature;
use App\Models\Picture;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AccommodationController extends Controller
{
    public function index() {
        $accommodations= Accommodation::orderBy('rooms', 'desc')->get();
        foreach($accommodations as $accommodation) {
            $pictures[]= Picture::where('accommodation_id', $accommodation->id)->get();
            $features[]= Feature::where('accommodation_id', $accommodation->id)->get();
        }
        if(!empty($pictures) && !empty($features)) {
            return response()->json(['accommodations' => $accommodations, 'features' => $features, 'pictures' => $pictures], Response::HTTP_ACCEPTED);
        }
        return response()->json(['accommodations' => $accommodations], Response::HTTP_ACCEPTED);
    }

    public function show($id) {
        $accommodation= Accommodation::find($id);
        $pictures[]= Picture::where('accommodation_id', $id)->get();
        $features= Feature::where('accommodation_id', $id)->get();
        $Comment= Comment::where('accommodation_id', $id)->get();
        
        return response()->json(['accommodation' => $accommodation, 'pictures' => $pictures, 'features' => $features, 'Comment' => $Comment], Response::HTTP_ACCEPTED);
    }

    public function store(Request $request) {
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
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'address1' => ['required'],
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
            'hot_tub' => ['integer', 'in:0,1'],
            'images' => ['required'],
            'images.*' => ['file', 'max:2048', 'mimes:jpeg,png,jpg']
        ]);
        
        if(!$validated->fails()) {
            $accommodation= Accommodation::create([
                'name' => $request->name,
                'rooms' => $request->rooms,
                'description' => $request->description,
                'town' => $request->town,
                'accommodation_type' => $request->accommodation_type,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'price' => $request->price,
                'user_id' => Auth::user()->id
            ]);
            
            $features= Feature::create([
                'pool' => $request->pool,
                'bbq' => $request->bbq,
                'pool_table' => $request->pool_table,
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

            foreach($request->images as $img) {
                $generatedName= $img->getClientOriginalName() . time(). '.' . $img->getClientOriginalExtension();
                $path= 'upload' . '/' . $generatedName;
                $picture= Picture::create([
                    'path' => $path,
                    'ext' => $img->getClientOriginalExtension(),
                    'description' => Auth::user()->id,
                    'user_id' => Auth::user()->id,
                    'accommodation_id' => $accommodation->id
                ]);
                $img->move(public_path('upload/'), $generatedName);
            }

            if($accommodation && $features && $picture) {
                return response()->json('Accommodation Created!', Response::HTTP_CREATED);
            }
        }
        return response()->json('Accommodation not created!', Response::HTTP_FORBIDDEN);

    }

    public function delete($id) {
        $accommodation= Accommodation::find($id);
        $features= Feature::where('accommodation_id', $id);
        $pictures= Picture::where('accommodation_id', $id);
        if($features->delete() && $accommodation->delete() && $pictures->delete()) {
            return response()->json('Accommodation deleted successfully', Response::HTTP_ACCEPTED);
        }

        return response()->json('Error while doing that!', Response::HTTP_FORBIDDEN);
    }

    public function update(Request $request, $id) {
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
            'hot_tub' => ['integer', 'in:0,1'],
            'images' => ['required'],
            'images.*' => ['file', 'max:2048', 'mimes:jpeg,png,jpg']
        ]);

        if(!$validated->fails()) {
            $accommodation= Accommodation::find($id)->update([
                'name' => $request->name,
                'rooms' => $request->rooms,
                'description' => $request->description,
                'town' => $request->town,
                'accommodation_type' => $request->accommodation_type
            ]);

            $features= Feature::find($id)->update([
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
            foreach($request->images as $img) {
                $generatedName= $img->getClientOriginalName() . time(). '.' . $img->getClientOriginalExtension();
                $path= 'upload' . '/' . $generatedName;
                $picture= Picture::create([
                    'path' => $path,
                    'ext' => $img->getClientOriginalExtension(),
                    'description' => Auth::user()->id,
                    'user_id' => Auth::user()->id,
                    'accommodation_id' => $id
                ]);
                $img->move(public_path('upload/'), $generatedName);
            }
                
            if($accommodation && $features &&   $picture) {
                return response()->json('Updated!', Response::HTTP_ACCEPTED);
            }
        }

        return response()->json('Not updated', Response::HTTP_NOT_ACCEPTABLE);
    }

    public function showMyAccommodations($id) {
        $accommodations= Accommodation::where('user_id', '=', $id)->get();
        foreach($accommodations as $accommodation) {
            $pictures[]= Picture::where('accommodation_id', '=', $accommodation->id)->get();
        }
        if(!empty($pictures)) {
            return response()->json(['accommodations' => $accommodations, 'pictures' => $pictures], Response::HTTP_ACCEPTED);
        }
        return response()->json(['accommodations' => $accommodations], Response::HTTP_ACCEPTED);
    }

    public function search(Request $request) {
        $data= json_decode($request->keywords, true);
        $validated= Validator::make($data, [
            'location' => ['required'],
            'checkIn' => ['required'],
            'checkOut' => ['required'],
            'rooms' => ['required']
        ]);
                
        if(!$validated->fails()) {
            $accommodations= Accommodation::where('town', 'LIKE', '%'. $data['location'] . '%')
                ->where('rooms', '>=', $data['rooms'])->get();

            foreach($accommodations as $accommodation) {
                $pictures[]= Picture::where('accommodation_id', '=', $accommodation->id)->get();
            }
            
            return response()->json(['accommodations'=> $accommodations, 'pictures' => $pictures], Response::HTTP_ACCEPTED);
        }

        return response()->json('Error', Response::HTTP_FORBIDDEN);
    }
}

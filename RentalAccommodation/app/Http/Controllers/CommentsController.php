<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation= Validator::make($request->all(), [
            'comment' => ['required'],
            'accommodationId' => ['required', 'integer'],
        ]);
        if(!$validation->fails()) {
           $comment= Comments::create([
                'comment' => $request->comment['comment'],
                'user_id' => Auth::user()->id,
                'accommodation_id' => $request->accommodationId
           ]);

           if($comment) {
                return response()->json('Comment created successfully', Response::HTTP_CREATED);
           }
        }
        return response()->json('Comment can\'t be created!', Response::HTTP_BAD_REQUEST);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comments $comments)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validation= Validator::make($request->all(), [
            'comment' => ['required'],
            'accommodationId' => ['required', 'integer'],
        ]);
        
        if(!$validation->fails()) {
            $hasCommented= Comment::where('user_id', Auth::user()->id)->where('accommodation_id', $request->accommodationId)->first();
            
            if($hasCommented) {
                $comment= $hasCommented->update([
                    'comment' => $request->comment['comment'],
                    'user_id' => Auth::user()->id,
                    'accommodation_id' => $request->accommodationId
                ]);

                if($comment) {
                        return response()->json('Comment updated successfully', Response::HTTP_OK);
                }
            }

            else {
                $comment= Comment::create([
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
    }
    
    public function index($id) {
         
        // Comments should show based on the accommodation id
        $comments= Comment::where('accommodation_id', $id)->orderBy('updated_at', 'desc')->get();
        foreach($comments as $comment) {
            $userFirstNames=User::select('first_name')->where('id', $comment['user_id'])->get()->toArray();
            foreach($userFirstNames as $userFirstName) {
                $message[]= array('id' => $comment['id'], 'name' => $userFirstName['first_name'], 'comment' => $comment['comment'], 'date' => $comment->updated_at->format('d/m/y'));
            }
        }
        if($message) {
            return response()->json($message, Response::HTTP_ACCEPTED);
        }

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}

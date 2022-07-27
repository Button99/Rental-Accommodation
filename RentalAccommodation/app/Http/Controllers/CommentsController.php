<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
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

    public function index() {
        $comments= Comments::orderBy('updated_at', 'desc')->get();

        return response()->json($comments, Response::HTTP_ACCEPTED);
    }

    public function update(Request $request, Comments $comments)
    {
        //
    }
}

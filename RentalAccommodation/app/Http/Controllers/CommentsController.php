<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\User;
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
        $comments= Comments::orderBy('updated_at', 'desc')->paginate(15);
        foreach($comments as $comment) {
            $userFirstNames=User::select('first_name')->where('id', $comment['user_id'])->get()->toArray();
            foreach($userFirstNames as $userFirstName) {
                $message= array('name' => array($userFirstName['first_name']  => array($comment['comment'] => $comment->updated_at->format('d/m/y'))));            }
            }
        return response()->json($message, Response::HTTP_ACCEPTED);
    }

    public function update(Request $request, Comments $comments)
    {
        //
    }
}

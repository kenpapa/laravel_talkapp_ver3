<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function create($postId)
  {
    return view('comments.create')->with('postId', $postId);
  }

  public function store(Request $request, $postId)
  {
    $this->validate($request, array(
            'message' => 'required',
    ));

    $comment = new Comment();
    $comment->message = $request->message;
    $comment->post_id = $postId;
    $comment->user_id = Auth::user()->id;
    $comment->save();

    return redirect()->route('posts.show', $postId);
  }
}

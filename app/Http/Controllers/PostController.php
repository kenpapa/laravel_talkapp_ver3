<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function index(Request $request)
  {
    if ($request->has('word'))
    {
      $word = $request->word;
      $posts = Post::where('message', 'LIKE', '%'.$word.'%')
                 ->orderBy('created_at', 'desc')->get();
    } else {
      $posts = Post::orderBy('created_at', 'desc')->get();
    }

    return view('posts.index')->with('posts', $posts);
  }

  public function show($id)
  {
    $post = Post::find($id);

    return view('posts.show')->with('post', $post);
  }

  public function create()
  {
    return view('posts.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, array(
            'message' => 'required',
            'file' => 'image'
    ));

    $post = new Post();
    $post->message = $request->message;
    $post->user_id = Auth::user()->id;

    if($request->hasFile('file')) {
      $file = $request->file('file');
      $images_path = public_path()."/images";
      $newfilename = time().$file->getClientOriginalName();
      $file->move($images_path, $newfilename);
      $post->image = $newfilename;
    } else {
      $post->image = "no image";
    }

    $post->save();

    return redirect()->route('posts.index');
  }

  public function destroy($id)
  {
    $post = Post::find($id);
    $post->delete();

    return redirect()->route('posts.index');
  }
}

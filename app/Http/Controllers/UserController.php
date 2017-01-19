<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use File;

class UserController extends Controller
{
  public function __construct() {
    $this->middleware('auth')->only('edit', 'update');
  }

  public function create()
  {
    return view('users.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, array(
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'file' => 'required|image'
    ));

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);

    $file = $request->file('file');
    $images_path = public_path()."/images";
    $newfilename = time().$file->getClientOriginalName();
    $file->move($images_path, $newfilename);
    $user->image = $newfilename;

    $user->save();

    Auth::login($user);

    return redirect()->route('posts.index');
  }

  public function edit($id)
  {
    $user = User::find($id);

    return view('users.edit')->with('user', $user);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, array(
            'name' => 'unique:users',
            'email' => 'email|unique:users',
            'password' => 'min:4',
            'file' => 'image'
    ));

    $user = User::find($id);

    if($request->has('name')) {
      $user->name = $request->name;
    }
    if($request->has('email')) {
      $user->email = $request->email;
    }
    if($request->has('password')) {
      $user->password = bcrypt($request->password);
    }
    if($request->hasFile('file')) {
      $old_image_file = public_path()."/images/".$user->image;
      File::delete($old_image_file);

      $file = $request->file('file');
      $images_path = public_path()."/images";
      $newfilename = time().$file->getClientOriginalName();
      $file->move($images_path, $newfilename);
      $user->image = $newfilename;
    }

    $user->save();

    return redirect()->route('posts.index');
  }
}

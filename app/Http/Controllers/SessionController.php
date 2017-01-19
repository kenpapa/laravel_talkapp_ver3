<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Session;

class SessionController extends Controller
{
  public function getLogin()
  {
    return view('sessions.login');
  }

  public function postLogin(Request $request)
  {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      Session::flash('success', 'You have successfully logged in');
      return redirect()->route('posts.index');
    }
    Session::flash('failure', 'There was a problem with your email or password');
    return view('sessions.login');
  }

  public function getLogout()
  {
    Auth::logout();
    return redirect()->route('home');
  }
}

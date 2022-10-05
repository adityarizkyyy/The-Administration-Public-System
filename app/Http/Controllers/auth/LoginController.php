<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
  protected $redirectTo = '/';

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function index()
  {
    return view('auth.login', [
      "img" => "jayaraya.png",
      "kata1" => "SELAMAT DATANG DI APEM15",
      "kata2" => "Administrasi Pelayanan Masyarakat RW 015"
    ]);
  }

  public function login(Request $request)
  {
    $input = $request->all();

    $this->validate($request, [
      'email' => 'required',
      'password' => 'required',
    ]);

    if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
      if (auth()->user()->hasRole('rt')) {
        return redirect()->route('rt.index');
      } elseif (auth()->user()->hasRole('rw')) {
        return redirect()->route('rw.index');
      } elseif (auth()->user()->hasRole('user')) {
        return redirect()->route('home');
      } else {
        return redirect()->route('login');
      }
    } else {
      return redirect()->route('login')->with('error', 'Email or Password Are Wrong.');
    }
  }

  public function logout()
  {
    auth()->logout();
    return redirect()->route('login');
  }
}

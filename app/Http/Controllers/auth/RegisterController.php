<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PersonalInformation;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  protected $redirectTo = '/';

  public function __construct()
  {
    $this->middleware('guest');
  }

  public function index()
  {
    return view('auth.registrasi', [
      "img" => "jayaraya.png",
      "kata1" => "Daftar APEM15",
      "kata2" => "Sukseskan Program Kampung Inovasi"
    ]);
  }
  public function rt_index()
  {
    return view('auth.registrasi-rt', [
      "img" => "jayaraya.png",
      "kata1" => "Daftar APEM15",
      "kata2" => "Sukseskan Program Kampung Inovasi"
    ]);
  }
  public function rw_index()
  {
    return view('auth.registrasi-rw', [
      "img" => "jayaraya.png",
      "kata1" => "Daftar APEM15",
      "kata2" => "Sukseskan Program Kampung Inovasi"
    ]);
  }

  public function create(Request $request)
  {
    $request->validate([
      'email' => 'required|string|email|unique:users',
      'password' => 'required|string|min:8',
      'nama' => 'required|string',
      'jk' => 'required|string',
      'agama' => 'required|string',
      'noktp' => 'required|string',
      'tempatlahir' => 'required|string',
      'tgllahir' => 'required|date',
      'status' => 'required|string',
      'pekerjaan' => 'required|string',
      'wilayahrt' => 'required|string',
      'nohp' => 'required|string',
    ]);

    $role = $request->has('role') ? $request->role : 'user';

    $user = User::create([
      'email' => $request['email'],
      'password' => Hash::make($request['password']),
    ]);

    $user->personal()->create([
      'user_id' => $user->id,
      'nama' => $request['nama'],
      'jk' => $request['jk'],
      'agama' => $request['agama'],
      'noktp' => $request['noktp'],
      'tempatlahir' => $request['tempatlahir'],
      'tgllahir' => $request['tgllahir'],
      'status' => $request['status'],
      'pekerjaan' => $request['pekerjaan'],
      'wilayahrt' => $request['wilayahrt'],
      'nohp' => $request['nohp'],
    ]);

    $user->assignRole([$role]);

    return redirect()->route('login');
  }
}

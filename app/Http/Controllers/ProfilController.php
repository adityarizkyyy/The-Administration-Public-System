<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
  public function index(Request $request)
  {
    $edit = $request->has('edit') ? true : false;
    return view('profil', [
      "title" => "Profil",
      "edit" => $edit
    ]);
  }

  public function update(Request $request)
  {
    $request->validate([
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

    $user = auth()->user();
    $user->personal()->update([
      'nama' => $request['nama'],
      'jk' => $request['jk'],
      'agama' => $request['agama'],
      'noktp' => $request['noktp'],
      'tempatlahir' => $request['tempatlahir'],
      'tgllahir' => $request['tgllahir'],
      'status' => $request['status'],
      'pekerjaan' => $request['pekerjaan'],
      'wilayahrt' => $request['wilayahrt'],
      'nohp' => $request['nohp']
    ]);

    return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui');
  }
  public function rt_index(Request $request)
  {
    $edit = $request->has('edit') ? true : false;
    return view('profil-rt', [
      "title" => "Profil",
      "edit" => $edit
    ]);
  }

  public function rt_update(Request $request)
  {
    $request->validate([
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

    $user = auth()->user();
    $user->personal()->update([
      'nama' => $request['nama'],
      'jk' => $request['jk'],
      'agama' => $request['agama'],
      'noktp' => $request['noktp'],
      'tempatlahir' => $request['tempatlahir'],
      'tgllahir' => $request['tgllahir'],
      'status' => $request['status'],
      'pekerjaan' => $request['pekerjaan'],
      'wilayahrt' => $request['wilayahrt'],
      'nohp' => $request['nohp']
    ]);

    return redirect()->route('rt.profil')->with('success', 'Profil berhasil diperbarui');
  }
  public function rw_index(Request $request)
  {
    $edit = $request->has('edit') ? true : false;
    return view('profil-rw', [
      "title" => "Profil",
      "edit" => $edit
    ]);
  }

  public function rw_update(Request $request)
  {
    $request->validate([
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

    $user = auth()->user();
    $user->personal()->update([
      'nama' => $request['nama'],
      'jk' => $request['jk'],
      'agama' => $request['agama'],
      'noktp' => $request['noktp'],
      'tempatlahir' => $request['tempatlahir'],
      'tgllahir' => $request['tgllahir'],
      'status' => $request['status'],
      'pekerjaan' => $request['pekerjaan'],
      'wilayahrt' => $request['wilayahrt'],
      'nohp' => $request['nohp']
    ]);

    return redirect()->route('rw.profil')->with('success', 'Profil berhasil diperbarui');
  }
}

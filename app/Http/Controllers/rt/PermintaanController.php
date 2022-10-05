<?php

namespace App\Http\Controllers\rt;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class PermintaanController extends Controller
{
  public function index()
  {
    $permintaan = Permohonan::where('status_progres', 'Pending')->WhereHas('user', function (Builder $query) {
      $query->whereHas('personal', function (Builder $query) {
        $query->where('wilayahrt', auth()->user()->personal->wilayahrt);
      });
    })->get();
    return view('rt-home', [
      "title" => "Dashboard",
      "judul" => "Permintaan Permohonan",
      "permintaan" => $permintaan
    ]);
  }

  public function permintaan(Request $request, Permohonan $permohonan)
  {
    if ($permohonan->status_progres !== 'Pending') {
      return abort(404);
    }
    return view('rt-permintaan', [
      "title" => "Permintaan Permohonan",
      "permohonan" => $permohonan
    ]);
  }

  public function pengantar(Request $request, Permohonan $permohonan)
  {
    if ($permohonan->status_progres !== 'Pending') {
      return abort(404);
    }
    return view('rt-upload-sk', [
      "title" => "Permintaan Permohonan",
      "notice" => "Silahkan upload Surat Pengantar",
      "permohonan" => $permohonan
    ]);
  }

  public function uploadPengantar(Request $request, Permohonan $permohonan)
  {
    if ($permohonan->status_progres !== 'Pending') {
      return abort(404);
    }
    if ($request->has('status')) {
      if ($request->status === 'tolak') {
        $permohonan->update(['status_progres' => 'Validasi Pertama Gagal']);
        $permohonan->save();

        return redirect()->route('rt.index')->with('success', 'Permohonan berhasil ditolak');
      }
    }

    $this->validate($request, [
      'filesk' => 'required|file'
    ]);

    if ($request->hasFile('filesk')) {
      $file = $request->file('filesk');

      $extension = $file->getClientOriginalExtension();
      $filename = 'sk_' . $permohonan->id . '-' . $permohonan->user_id . '-' . $permohonan->jenis_permohonan_id . '_' . time() . '.' . $extension;
      if (!Storage::disk('local')->exists('rt/sk/' . $filename)) {
        Storage::disk('local')->put('rt/sk/' . $filename, $file->get());
      }

      $permohonan->suratPengantar()->create(['filesk' => 'rt/sk/' . $filename]);
      $permohonan->update(['status_progres' => 'Validasi Pertama Berhasil']);
      $permohonan->save();
      return redirect()->route('rt.index')->with('success', 'Surat Pengantar berhasil diupload');
    } else {
      return back(400)->withErrors(['Surat Pengantar tidak boleh kosong']);
    }
  }
}

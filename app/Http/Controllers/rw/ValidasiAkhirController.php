<?php

namespace App\Http\Controllers\rw;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use App\Models\JenisPermohonan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class ValidasiAkhirController extends Controller
{
  public function index()
  {
    $count = Permohonan::where('status_progres', 'Validasi Pertama Berhasil')->count();
    $done = JenisPermohonan::withCount(['permohonan' => function (Builder $query) {
      $query->where('status_progres', 'SP Telah Disetujui');
    }])->get();
    return view('rw-home', [
      "title" => "Dashboard",
      "judul" => "Permintaan Persetujuan Permohonan",
      "count" => $count,
      "done" => $done
    ]);
  }

  public function permintaan(Request $request)
  {
    $permintaan = Permohonan::where('status_progres', 'Validasi Pertama Berhasil')->get();
    return view('rw-permintaan', [
      "judul" => "Permintaan Persetujuan Permohonan",
      "title" => "Permintaan Persetujuan Permohonan",
      "permintaan" => $permintaan
    ]);
  }

  public function persetujuan(Request $request, Permohonan $permohonan)
  {
    if ($permohonan->status_progres !== 'Validasi Pertama Berhasil') {
      return abort(404);
    }
    return view('rw-permintaan-persetujuan', [
      "judul" => "Permintaan Persetujuan Permohonan",
      "title" => "Permintaan Persetujuan Permohonan",
      "permohonan" => $permohonan
    ]);
  }

  public function permohonan(Request $request, Permohonan $permohonan)
  {
    if ($permohonan->status_progres !== 'Validasi Pertama Berhasil') {
      return abort(404);
    }
    return view('rw-upload-sp', [
      "title" => "Permintaan Persetujuan Permohonan",
      "notice" => "Silahkan upload Surat Permohonan",
      "permohonan" => $permohonan
    ]);
  }

  public function uploadPermohonan(Request $request, Permohonan $permohonan)
  {
    if ($permohonan->status_progres !== 'Validasi Pertama Berhasil') {
      return abort(404);
    }

    // batas
    if ($request->has('status')) {
      if ($request->status === 'tolak') {
        $permohonan->update(['status_progres' => 'Validasi Akhir Gagal']);
        $permohonan->save();

        return redirect()->route('rw.permintaan')->with('success', 'Permohonan berhasil ditolak');
      }
    }
    // batas

    $this->validate($request, [
      'nosp' => 'required',
      'filesp' => 'required|file'
    ]);

    if ($request->hasFile('filesp')) {
      $file = $request->file('filesp');

      $extension = $file->getClientOriginalExtension();
      $dirname = $permohonan->user_id . '/suratpermohonan/';
      $filename = 'sp_' . $permohonan->id . '-' . $permohonan->user_id . '-' . $permohonan->jenis_permohonan_id . '_' . $permohonan->jenisPermohonan->kode_permohonan . '_' . time() . '.' . $extension;
      if (!Storage::disk('local')->exists($dirname . $filename)) {
        Storage::disk('local')->put($dirname . $filename, $file->get());
      }

      $permohonan->suratPermohonan()->create([
        'nosp' => $request->nosp,
        'filesp' => $dirname . $filename
      ]);
      $permohonan->update(['status_progres' => 'SP Telah Disetujui']);
      $permohonan->save();
      return redirect()->route('rw.permintaan')->with(['success' => 'Berhasil Upload Surat Permohonan']);
    } else {
      return back(400)->withErrors(['Surat Permohonan tidak boleh kosong']);
    }
  }
}

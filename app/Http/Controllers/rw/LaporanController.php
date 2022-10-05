<?php

namespace App\Http\Controllers\rw;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class LaporanController extends Controller
{
  public function index(Request $request)
  {
    $filter = $request->get('filter');
    $permintaan = Permohonan::where('status_progres', 'SP Telah Disetujui')->get();
    if ($request->has('filter')) {
      $permintaan = Permohonan::where('status_progres', 'SP Telah Disetujui')->WhereHas('jenisPermohonan', function (Builder $query) use ($filter) {
        $query->where('kode_permohonan', $filter);
      })->get();
      if ($filter === 'all') {
        $permintaan = Permohonan::where('status_progres', 'SP Telah Disetujui')->get();
      }
    }

    return view('rw-laporan', [
      "title" => "Laporan",
      "judul" => "Laporan",
      "filter" => $filter,
      "permintaan" => $permintaan
    ]);
  }

  public function download(Request $request)
  {
    $filter = $request->get('filter');
    return Excel::download(new LaporanExport($filter), 'laporan' . now()->format('dmy') . '.xlsx');
  }
}

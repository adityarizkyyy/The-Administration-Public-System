<?php

namespace App\Http\Controllers\rw;

use App\Models\Permohonan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Database\Eloquent\Builder;


class LaporanExport implements FromView
{
  private $filter;

  public function __construct($filter)
  {
    $this->filter = $filter;
  }

  public function view(): View
  {
    $filter = $this->filter;
    $permintaan = Permohonan::where('status_progres', 'SP Telah Disetujui')->get();
    if (isset($filter)) {
      $permintaan = Permohonan::where('status_progres', 'SP Telah Disetujui')->WhereHas('jenisPermohonan', function (Builder $query) use ($filter) {
        $query->where('kode_permohonan', $filter);
      })->get();
      if ($filter === 'all') {
        $permintaan = Permohonan::where('status_progres', 'SP Telah Disetujui')->get();
      }
    }
    return view('exports.laporan', [
      "permintaan" => $permintaan
    ]);
  }
}

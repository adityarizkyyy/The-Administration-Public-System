<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPermohonan extends Model
{
    use HasFactory;

    protected $table = "surat_permohonan";

    protected $fillable = [
        'nosp',
        'filesp'
    ];

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class, "permohonan_id");
    }
}

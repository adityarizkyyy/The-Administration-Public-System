<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPengantar extends Model
{
    use HasFactory;

    protected $table = "surat_pengantar";

    protected $fillable = [
        'filesk'
    ];

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class, "permohonan_id");
    }
}

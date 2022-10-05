<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPermohonan extends Model
{
    use HasFactory;

    protected $table = "jenis_permohonan";

    protected $fillable = [
        'jenis_permohonan',
        'formulir'
    ];

    protected $casts = [
        'formulir' => 'array'
    ];

    public function permohonan()
    {
        return $this->hasMany(Permohonan::class, 'jenis_permohonan_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormKjp extends Model
{
    use HasFactory;

    protected $table = "form_kjp";

    protected $fillable = [
        'filektpibu',
        'filekk',
        'filesktm',
        'filekjp',
    ];

    protected $casts = [
        'filekjp' => 'array',
    ];

    public $rules = [
        'filektpibu' => 'required|file',
        'filekk' => 'required|file',
        'filesktm' => 'required|file',
        'filekjp' => 'required|file',
    ];

    public $messages = [
        'filektpibu.required' => 'File KTP Ibu Wajib Diisi',
        'filektpibu.file' => 'File KTP Ibu Harus Berupa File',
        'filekk.required' => 'File KK Wajib Diisi',
        'filekk.file' => 'File KK Harus Berupa File',
        'filesktm.required' => 'File SKTM Wajib Diisi',
        'filesktm.file' => 'File SKTM Harus Berupa File',
        'filekjp.required' => 'File KJP Wajib Diisi',
        'filekjp.file' => 'File KJP Harus Berupa File',
    ];

    public function displayInformation()
    {
        return [
            'file' => [
                'filektpibu' => ['Fotokopi KTP Ibu', $this->filektpibu],
                'filekk' => ['Fotokopi KK', $this->filekk],
                'filesktm' => ['SKTM', $this->filesktm],
                'filekjp' => ['Fotokopi Instrumen KJP', $this->filekjp],
            ]
        ];
    }

    public function permintaan()
    {
        return $this->morphOne(Permohonan::class, 'form');
    }
}

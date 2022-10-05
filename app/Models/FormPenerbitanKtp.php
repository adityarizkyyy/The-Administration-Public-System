<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPenerbitanKtp extends Model
{
    use HasFactory;

    protected $table = "form_penerbitan_ktp";

    protected $fillable = [
        'filektpkepalart',
        'fileakta',
        'filekk',
    ];

    public $rules = [
        'filektpkepalart' => 'required|file',
        'fileakta' => 'required|file',
        'filekk' => 'required|file', //|mimes:pdf
    ];

    public $messages = [
        'filektpkepalart.required' => 'File KTP Kepala RT Wajib Diisi',
        'filektpkepalart.file' => 'File KTP Kepala RT Harus Berupa File',
        'fileakta.required' => 'File Akta Wajib Diisi',
        'fileakta.file' => 'File Akta Harus Berupa File',
        'filekk.required' => 'File KK Wajib Diisi',
        'filekk.file' => 'File KK Harus Berupa File',
    ];

    public function displayInformation()
    {
        return [
            'file' => [
                'filekk' => ['Fotokopi KK', $this->filekk],
                'fileakta' => ['Fotokopi Akta Kelahiran', $this->fileakta],
                'filektpkepalart' => ['Fotokopi KTP Kepala Rumah Tangga', $this->filektpkepalart],
            ]
        ];
    }

    public function permintaan()
    {
        // morphone : relasi polimorfic one to one
        return $this->morphOne(Permohonan::class, 'form');
    }
}

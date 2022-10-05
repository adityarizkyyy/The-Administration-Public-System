<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPindahKeluar extends Model
{
    use HasFactory;

    protected $table = "form_pindah_keluar";

    protected $fillable = [
        'namakepalakeluarga',
        'alamatsekarang',
        'alamattujuan',
        'jumlahanggotapindah',
        'filektp',
        'filekk',
    ];
    public $rules = [
        'namakepalakeluarga' => 'required',
        'alamatsekarang' => 'required',
        'alamattujuan' => 'required',
        'jumlahanggotapindah' => 'required|numeric',
        'filektp' => 'required|file',
        'filekk' => 'required|file',
    ];

    public $messages = [
        'namakepalakeluarga.required' => 'Nama Kepala Keluarga Wajib Diisi',
        'alamatsekarang.required' => 'Alamat Sekarang Wajib Diisi',
        'alamattujuan.required' => 'Alamat Tujuan Wajib Diisi',
        'jumlahanggotapindah.required' => 'Jumlah Anggota Pindah Wajib Diisi',
        'jumlahanggotapindah.numeric' => 'Jumlah Anggota Pindah Harus Berupa Angka',
        'filektp.required' => 'File KTP Wajib Diisi',
        'filektp.file' => 'File KTP Harus Berupa File',
        'filekk.required' => 'File KK Wajib Diisi',
        'filekk.file' => 'File KK Harus Berupa File',
    ];

    public function displayInformation()
    {
        return [
            'var' => [
                'namakepalakeluarga' => ['Nama Kepala Keluarga', $this->namakepalakeluarga],
                'alamatsekarang' => ['Alamat Sekarang', $this->alamatsekarang],
                'alamattujuan' => ['Alamat Tujuan', $this->alamattujuan],
                'jumlahanggotapindah' => ['Jumlah Anggota yang akan Pindah', $this->jumlahanggotapindah],
            ],
            'file' => [
                'filektp' => ['Fotokopi KTP', $this->filektp],
                'filekk' => ['Fotokopi KK', $this->filekk],
            ]
        ];
    }

    public function permintaan()
    {
        return $this->morphOne(Permohonan::class, 'form');
    }
}

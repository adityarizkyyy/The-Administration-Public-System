<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormPenerbitanKk extends Model
{
    use HasFactory;

    protected $table = "form_penerbitan_kk";

    protected $fillable = [
        'namakepalakeluarga',
        'filedraftkk',
        'filebukunikah',
        'filektpanggota',
        'fileaktaanggota',
    ];

    protected $casts = [
        'filektpanggota' => 'array',
        'fileaktaanggota' => 'array',
    ];

    public $rules = [
        'namakepalakeluarga' => 'required',
        'filedraftkk' => 'required|file',
        'filebukunikah' => 'file',
        'filektpanggota.*' => 'required|file',
        'fileaktaanggota.*' => 'required|file',
    ];

    public $messages = [
        'namakepalakeluarga.required' => 'Nama Kepala Keluarga Wajib Diisi',
        'filedraftkk.required' => 'File Draft KK Wajib Diisi',
        'filedraftkk.file' => 'File Draft KK Harus Berupa File',
        'filebukunikah.file' => 'File Bukti Nikah Wajib Diisi',
        'filektpanggota.*.required' => 'File KTP Anggota Wajib Diisi',
        'filektpanggota.*.file' => 'File KTP Anggota Harus Berupa File',
        'fileaktaanggota.*.required' => 'File Akta Anggota Wajib Diisi',
        'fileaktaanggota.*.file' => 'File Akta Anggota Harus Berupa File',
    ];

    public function displayInformation()
    {
        return [
            'var' => [

                'namakepalakeluarga' => ['Nama Kepala Keluarga', $this->namakepalakeluarga],
            ],
            'file' => [
                'filebukunikah' => ['Fotokopi Buku Nikah', $this->filebukunikah],
                'filedraftkk' => ['Draft KK', $this->filedraftkk],
                'filektpanggota' => ['Fotokopi KTP Anggota', $this->filektpanggota],
                'fileaktaanggota' => ['Fotokopi Akta Kelahiran Anggota', $this->fileaktaanggota],
            ]
        ];
    }

    public function permintaan()
    {
        return $this->morphOne(Permohonan::class, 'form');
    }
}

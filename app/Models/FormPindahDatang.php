<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPindahDatang extends Model
{
    use HasFactory;

    protected $table = "form_pindah_datang";

    protected $fillable = [
        'filektp',
        'filekk',
        'fileskp',
        'fileformpenjamin',
        'filektppenjamin',
        'filekkpenjamin',
        'filedraftkk',
    ];

    public $rules = [
        'filektp' => 'required|file',
        'filekk' => 'required|file',
        'fileskp' => 'required|file',
        'fileformpenjamin' => 'required|file',
        'filektppenjamin' => 'required|file',
        'filekkpenjamin' => 'required|file',
        'filedraftkk' => 'required|file'
    ];

    public $messages = [
        'filektp.required' => 'File KTP Wajib Diisi',
        'filektp.file' => 'File KTP Harus Berupa File',
        'filekk.required' => 'File KK Wajib Diisi',
        'filekk.file' => 'File KK Harus Berupa File',
        'fileskp.required' => 'File SKP Wajib Diisi',
        'fileskp.file' => 'File SKP Harus Berupa File',
        'fileformpenjamin.required' => 'File Form Penjamin Wajib Diisi',
        'fileformpenjamin.file' => 'File Form Penjamin Harus Berupa File',
        'filektppenjamin.required' => 'File KTP Penjamin Wajib Diisi',
        'filektppenjamin.file' => 'File KTP Penjamin Harus Berupa File',
        'filekkpenjamin.required' => 'File KK Penjamin Wajib Diisi',
        'filekkpenjamin.file' => 'File KK Penjamin Harus Berupa File',
        'filedraftkk.required' => 'File Draft KK Wajib Diisi',
        'filedraftkk.file' => 'File Draft KK Harus Berupa File'
    ];

    public function displayInformation()
    {
        return [
            'file' => [
                'filektp' => ['Fotokopi KTP', $this->filektp],
                'filekk' => ['Fotokopi KK', $this->filekk],
                'fileskp' => ['SKP', $this->fileskp],
                'fileformpenjamin' => ['Formulir Penjamin', $this->fileformpenjamin],
                'filektppenjamin' => ['Fotokopi KTP Penjamin', $this->filektppenjamin],
                'filekkpenjamin' => ['Fotokopi KK Penjamin', $this->filekkpenjamin],
                'filedraftkk' => ['Draft KK', $this->filedraftkk],
            ]
        ];
    }

    public function permintaan()
    {
        return $this->morphOne(Permohonan::class, 'form');
    }
}

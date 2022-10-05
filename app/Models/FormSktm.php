<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSktm extends Model
{
    use HasFactory;

    protected $table = "form_sktm";

    protected $fillable = [
        'filektp',
        'filekk',
        'filesktm',
    ];

    public $rules = [
        'filektp' => 'required|file',
        'filekk' => 'required|file',
        'filesktm' => 'required|file'
    ];

    public $messages = [
        'filektp.required' => 'File KTP Wajib Diisi',
        'filektp.file' => 'File KTP Harus Berupa File',
        'filekk.required' => 'File KK Wajib Diisi',
        'filekk.file' => 'File KK Harus Berupa File',
        'filesktm.required' => 'File SKTM Wajib Diisi',
        'filesktm.file' => 'File SKTM Harus Berupa File'
    ];

    public function displayInformation()
    {
        return [
            'file' => [
                'filektp' => ['Fotokopi KTP', $this->filektp],
                'filekk' => ['Fotokopi KK', $this->filekk],
                'filesktm' => ['SKTM', $this->filesktm],
            ]
        ];
    }

    public function permintaan()
    {
        return $this->morphOne(Permohonan::class, 'form');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormUsahaMikro extends Model
{
    use HasFactory;

    protected $table = 'form_usaha_mikro';

    protected $fillable = [
        'alamat',
        'jenispermohonan',
        'nonpwp',
        'nonib',
        'namausaha',
        'kegiatanusaha',
        'jumlahtenagakerja',
        'jenisrekomendasi',
        'nosuratrekomendasi',
        'statuslokasiusaha',
        'statuskepemilikanusaha',
        'luaslokasi',
        'lamausaha',
        'alatutamausaha',
        'kelurahanusaha',
        'kecamatanusaha',
        'kotausaha',
        'omsetsebelumcovid',
        'omsetsetelahcovid',
        'mediapemasaran',
        'filepasfoto',
        'filektp',
        'filekk',
        'filefototempatusaha',
        'filesuratketpasarjaya'
    ];

    public $rules = [
        'alamat' => 'required',
        'jenispermohonan' => 'required',
        'nonpwp' => 'required',
        'nonib' => 'required',
        'namausaha' => 'required',
        'kegiatanusaha' => 'required',
        'jumlahtenagakerja' => 'required',
        'jenisrekomendasi' => 'required',
        'statuslokasiusaha' => 'required',
        'statuskepemilikanusaha' => 'required',
        'luaslokasi' => 'required',
        'lamausaha' => 'required',
        'alatutamausaha' => 'required',
        'kelurahanusaha' => 'required',
        'kecamatanusaha' => 'required',
        'kotausaha' => 'required',
        'omsetsebelumcovid' => 'required|numeric',
        'omsetsetelahcovid' => 'required|numeric',
        'mediapemasaran' => 'required',
        'filepasfoto' => 'required|file',
        'filektp' => 'required|file',
        'filekk' => 'required|file',
        'filefototempatusaha' => 'required|file',
        'filesuratketpasarjaya' => 'file',
    ];

    public $messages = [
        'alamat.required' => 'Alamat Wajib Diisi',
        'jenispermohonan.required' => 'Jenis Permohonan Wajib Diisi',
        'nonpwp.required' => 'Nomor NPWP Wajib Diisi',
        'nonib.required' => 'Nomor NIB Wajib Diisi',
        'namausaha.required' => 'Nama Usaha Wajib Diisi',
        'kegiatanusaha.required' => 'Kegiatan Usaha Wajib Diisi',
        'jumlahtenagakerja.required' => 'Jumlah Tenaga Kerja Wajib Diisi',
        'jenisrekomendasi.required' => 'Jenis Rekomendasi Wajib Diisi',
        'statuslokasiusaha.required' => 'Status Lokasi Usaha Wajib Diisi',
        'statuskepemilikanusaha.required' => 'Status Kepemilikan Usaha Wajib Diisi',
        'luaslokasi.required' => 'Luas Lokasi Wajib Diisi',
        'lamausaha.required' => 'Lama Usaha Wajib Diisi',
        'alatutamausaha.required' => 'Alat Utama Usaha Wajib Diisi',
        'kelurahanusaha.required' => 'Kelurahan Usaha Wajib Diisi',
        'kecamatanusaha.required' => 'Kecamatan Usaha Wajib Diisi',
        'kotausaha.required' => 'Kota Usaha Wajib Diisi',
        'omsetsebelumcovid.required' => 'Omset Sebelum COVID Wajib Diisi',
        'omsetsebelumcovid.numeric' => 'Omset Sebelum COVID Harus Angka',
        'omsetsetelahcovid.required' => 'Omset Setelah COVID Wajib Diisi',
        'omsetsetelahcovid.numeric' => 'Omset Setelah COVID Harus Angka',
        'mediapemasaran.required' => 'Media Pemasaran Wajib Diisi',
        'filepasfoto.required' => 'File Foto Wajib Diisi',
        'filepasfoto.file' => 'File Foto Harus Berupa File',
        'filektp.required' => 'File KTP Wajib Diisi',
        'filektp.file' => 'File KTP Harus Berupa File',
        'filekk.required' => 'File KK Wajib Diisi',
        'filekk.file' => 'File KK Harus Berupa File',
        'filefototempatusaha.required' => 'File Foto Tempat Usaha Wajib Diisi',
        'filefototempatusaha.file' => 'File Foto Tempat Usaha Harus Berupa File',
        'filesuratketpasarjaya.file' => 'File Surat Keterangan Wajib Diisi',
    ];

    public function displayInformation()
    {
        return [
            'var' => [
                'alamat' => ['Alamat', $this->alamat],
                'jenispermohonan' => ['Jenis Permohonan', $this->jenispermohonan],
                'nonpwp' => ['Nomor NPWP', $this->nonpwp],
                'nonib' => ['Nomor NIB', $this->nonib],
                'namausaha' => ['Nama Usaha', $this->namausaha],
                'kegiatanusaha' => ['Kegiatan Usaha', $this->kegiatanusaha],
                'jumlahtenagakerja' => ['Jumlah Tenaga Kerja', $this->jumlahtenagakerja],
                'jenisrekomendasi' => ['Jenis Rekomendasi', $this->jenisrekomendasi],
                'nosuratrekomendasi' => ['Nomor Surat Rekomendasi', $this->nosuratrekomendasi],
                'statuslokasiusaha' => ['Status Lokasi Usaha', $this->statuslokasiusaha],
                'statuskepemilikanusaha' => ['Status Kepemilikan Usaha', $this->statuskepemilikanusaha],
                'luaslokasi' => ['Luas Lokasi', $this->luaslokasi],
                'lamausaha' => ['Lama Usaha', $this->lamausaha],
                'alatutamausaha' => ['Alat Utama Usaha', $this->alatutamausaha],
                'kelurahanusaha' => ['Kelurahan Usaha', $this->kelurahanusaha],
                'kecamatanusaha' => ['Kecamatan Usaha', $this->kecamatanusaha],
                'kotausaha' => ['Kota Usaha', $this->kotausaha],
                'omsetsebelumcovid' => ['Omset Sebelum COVID', $this->omsetsebelumcovid],
                'omsetsetelahcovid' => ['Omset Setelah COVID', $this->omsetsetelahcovid],
                'mediapemasaran' => ['Media Pemasaran', $this->mediapemasaran],
            ],
            'file' => [
                'filepasfoto' => ['FPas Foto', $this->filepasfoto],
                'filektp' => ['Fotokopi KTP', $this->filektp],
                'filekk' => ['Fotokopi KK', $this->filekk],
                'filefototempatusaha' => ['Foto Tempat Usaha', $this->filefototempatusaha],
                'filesuratketpasarjaya' => ['Surat Keterangan Pasar Jaya', $this->filesuratketpasarjaya],
            ],
        ];
    }

    public function permintaan()
    {
        return $this->morphOne(Permohonan::class, 'form');
    }
}

@extends('layouts.main')

@section('container')
    <center>
        <h1 class="judul">{{ $title }}</h1>
        <h4 class="mb-3">Persyaratan sebagai berikut</h4>

        <div class="mar-bot">
            <table border="0">
                <tr>
                    <td>1.</td>
                    <td>Pas Foto Pemohon</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>Scan KTP Pemohon</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Scan Kartu Keluargan</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Foto Tempat Usaha</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Scan Surat Keterangan dari Pasar Jaya</td>
                </tr>
                <tr>
                    <td></td>
                    <td><span class="notice">*Jika usaha berlokasi di Pasar Jaya</span></td>
                </tr>
            </table>
        </div>

        <a href="{{ route('form-perm', ['form' => 'um']) }}">
            <button class="perm-button">Selanjutnya</button>
        </a>
    </center>
@endsection

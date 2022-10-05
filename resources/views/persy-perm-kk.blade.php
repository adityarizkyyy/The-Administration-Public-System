@extends('layouts.main')

@section('container')
    <center>
        <h1 class="judul">{{ $title }}</h1>
        <h4 class="mb-3">Persyaratan sebagai berikut</h4>

        <div class="mar-bot">
            <table border="0">
                <tr>
                    <td>1.</td>
                    <td>Scan KTP Seluruh Anggota Keluarga</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td><span>Scan Buktu Nikah <span class="notice">*Jika sudah menikah</span></span></td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Scan Akta Kelahiran Seluruh anggota Keluarga</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Mengisi Formulir 'Draft KK'</td>
                </tr>
            </table>
        </div>

        <a href="{{ asset($jenis->formulir[0]) }}" target="_blank">
            <button class="download-form-button mb-2">Download Formulir</button>
        </a>
        <br>
        <p class="notice-formulir">
            Jika belum memiliki formulir, silahkan download formulir terlebih dahulu <br>
            dengan menekan ‘Download Formulir’ di atas!
        </p>
        <a href="{{ route('form-perm', ['form' => 'kk']) }}">
            <button class="perm-button">Selanjutnya</button>
        </a>
    </center>
@endsection

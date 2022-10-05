@extends('layouts.main')

@section('container')
    <center>
        <h1 class="judul">{{ $title }}</h1>
        <h4 class="mb-3">Persyaratan sebagai berikut</h4>

        <div class="mar-bot">
            <table border="0">
                <tr>
                    <td>1.</td>
                    <td>Scan KTP Ibu</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Scan Kartu Keluargan</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Fotokopi Instrumen KJP dari Sekolah</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td><span>Formulir SKTM <span class="notice">*Bermaterai 10 Ribu</span></span></td>
                </tr>
            </table>
        </div>

        <a href="{{ asset($jenis->formulir[0]) }}" target="_blank">
            <button class="download-form-button mb-2">Download Formulir</button>
        </a>
        <br>
        <p class="notice-formulir">
            JJika belum memiliki formulir, silahkan download formulir terlebih dahulu <br>
            dengan menekan ‘Download Formulir’ di atas!
        </p>
        <a href="{{ route('form-perm', ['form' => 'kjp']) }}">
            <button class="perm-button">Selanjutnya</button>
        </a>
    </center>
@endsection

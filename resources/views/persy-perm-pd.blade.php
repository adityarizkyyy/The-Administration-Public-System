@extends('layouts.main')

@section('container')
    <center>
        <h1 class="judul">{{ $title }}</h1>
        <h4 class="mb-3">Persyaratan sebagai berikut</h4>

        <div class="mar-bot">
            <table border="0">
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
                    <td>Scan SKP (Surat Keterangan Pindah) dari DUKCAPIL</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td><span>Formulir Warga Penjamin <span class="notice">*Bermaterai 10 Ribu</span></span></td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Scan KTP Penjamin</td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Scan Kartu Keluarga Penjamin</td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>Mengisi Formulir 'Draft KK'</td>
                </tr>
            </table>
        </div>

        <a href="{{ asset($jenis->formulir[0]) }}" target="_blank">
            <button class="download-form-button mb-2">Download Formulir</button>
        </a><br>
        <a href="{{ asset($jenis->formulir[1]) }}" target="_blank">
            <button class="download-form-button mb-2">Download Draft KK</button>
        </a>
        <br>
        <p class="notice-formulir">
            Jika belum memiliki formulir, silahkan download formulir terlebih <br>
            dahulu dengan menekan ‘Download Formulir’ di atas!
        </p>
        <a href="{{ route('form-perm', ['form' => 'pd']) }}">
            <button class="perm-button">Selanjutnya</button>
        </a>
    </center>
@endsection

@extends('layouts.main')

@section('container')
    <center>
        <h1 class="judul">Silahkan Pilih Permohonan</h1>
        <p class="judul"></p>
        <div class="judul">
            <a href="{{ route('persyaratan', ['need' => 'ktp']) }}">
                <button class="perm-button">Penerbitan Kartu Tanda Penduduk (KTP)</button>
            </a>
            <p></p>
            <a href="{{ route('persyaratan', ['need' => 'kk']) }}">
                <button class="perm-button">Penerbitan Kartu Keluarga (KK)</button>
            </a>
            <p></p>
            <a href="{{ route('persyaratan', ['need' => 'sktm']) }}">
                <button class="perm-button">Pengajuan Surat Keterangan Tidak Mampu (SKTM)</button>
            </a>
            <p></p>
            <a href="{{ route('persyaratan', ['need' => 'kjp']) }}">
                <button class="perm-button">Pengajuan Kartu Jakarta Pintar (KJP)</button>
            </a>
            <p></p>
            <a href="{{ route('persyaratan', ['need' => 'pk']) }}">
                <button class="perm-button">Pindah Keluar</button>
            </a>
            <p></p>
            <a href="{{ route('persyaratan', ['need' => 'pd']) }}">
                <button class="perm-button">Pindah Datang</button>
            </a>
            <p></p>
            <a href="{{ route('persyaratan', ['need' => 'um']) }}">
                <button class="perm-button">Pengajuan Usaha Mikro</button>
            </a>

        </div>
    </center>
@endsection

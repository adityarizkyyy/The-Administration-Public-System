@extends('layouts.main')

@section('container')
    <center>
        <h1 class="judul">{{ $title }}</h1>
        <h4 class="mb-4">Persyaratan sebagai berikut</h4>

        <div class="mar-bot">
            <table border="0">
                <tr>
                    <td>1.</td>
                    <td>Scan Kartu Keluarga</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Scan Akta Kelahiran</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Scan KTP Kepala Keluarga</td>
                </tr>
            </table>
        </div>

        <a href="{{ route('form-perm', ['form' => 'ktp']) }}">
            <button class="perm-button">Selanjutnya</button>
        </a>
    </center>
@endsection

@extends('layouts.main')

@section('container')
    <center>
        <h1 class="judul">{{ $title }}</h1>
        <h4 class="mb-4">Persyaratan sebagai berikut</h4>

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
            </table>
        </div>

        <center>
            <a href="{{ route('form-perm', ['form' => 'pk']) }}">
                <button class="perm-button">Selanjutnya</button>
            </a>
        </center>
    @endsection

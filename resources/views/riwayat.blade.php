@extends('layouts.main')

@section('container')
    <center>
        <h1 class="judul">{{ $title }}</h1>
    </center>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Permohonan</th>
                        <th scope="col">Jenis Permohonan</th>
                        <th scope="col">Status</th>
                        <th scope="col">File Surat Permohonan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($riwayat as $key => $item)
                        {{-- <tr onclick="window.location = '#TODO';" style="cursor: pointer;"> --}}
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>{{ $item->jenisPermohonan->jenis_permohonan }}</td>
                            <td>{{ $item->status_progres }}</td>
                            <td>
                                @isset($item->suratPermohonan->filesp)
                                    <a href="{{ route('download', ['link' => $item->suratPermohonan?->filesp]) }}"
                                        target="_blank" class="btn button-unduh btn-sm">Unduh SP</a>
                                @endisset
                            </td>
                        </tr>
                    @empty
                        <p align="center">Data Kosong</p>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection

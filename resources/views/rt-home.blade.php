@extends('layouts.main-rt')

@section('container-rt')
    <center>
        <h1 class="judul">{{ $judul }}</h1>
    </center>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jenis Permohonan</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Agama</th>
                        <th scope="col">No KTP</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permintaan as $key => $item)
                        <tr onclick="window.location = '{{ route('rt.permintaan', ['permohonan' => $item]) }}'"
                            style="cursor: pointer;">
                            <!-- kalau mau yang di klik cuman bisa button doang, yg di tr dihapus full aja -->
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->jenisPermohonan?->jenis_permohonan }}</td>
                            <td>{{ $item->user?->personal?->nama }}</td>
                            <td>{{ $item->user?->personal?->agama }}</td>
                            <td>{{ $item->user?->personal?->noktp }}</td>
                            <td><a onclick="window.location = '{{ route('rt.permintaan', ['permohonan' => $item]) }}'"
                                    href=""
                                    target="_blank" class="btn button-unduh btn-sm">Aksi</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <p align="center">Data Kosong</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>


@endsection

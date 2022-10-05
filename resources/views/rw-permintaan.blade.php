@extends('layouts.main-rw')

@section('container-rw')
    <center>
        <h1 class="judul">{{ $title }}</h1>
    </center>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jenis Permohonan</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Wilayah RT</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permintaan as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->jenisPermohonan?->jenis_permohonan }}</td>
                            <td>{{ $item->user?->personal?->nama }}</td>
                            <td>{{ $item->user?->personal?->wilayahrt }}</td>
                            <!-- <td><a onclick="event.stopPropagation()"
                                    href="{{ route('download', ['link' => $item->suratPengantar?->filesk]) }}"
                                    target="_blank" class="btn btn-secondary btn-sm">Open File</a></td> -->
                            <td>
                                <a onclick="window.location = '{{ route('rw.persetujuan', ['permohonan' => $item]) }}'"
                                href=""
                                target="_blank" class="btn button-unduh btn-sm">Aksi</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <p align="center">Data Kosong</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection

@extends('layouts.main-rw')

@section('container-rw')
    <center>
        <h1 class="judul">{{ $title }}</h1>
    </center>

    <div>
        <div>
            <a href="{{ route('rw.laporan.download', ['filter' => $filter]) }}" class="btn button-unduh mt-3">
            <i class="bi bi-download"></i><span>  Unduh</span>
            </a>
            <div class="input-group mt-3">
                <select class="form-select" aria-label="Default select example"
                    onchange="window.location = '{{ route('rw.laporan') }}?filter=' + this.options[this.selectedIndex].value;">
                    <option {{ $filter === '' ? 'selected ' : '' }}hidden>Filter Sesuai Jenis Permohonan</option>
                    <option {{ $filter === 'all' ? 'selected ' : '' }}value="all">Semua Jenis Permohonan</option>
                    <option {{ $filter === 'ktp' ? 'selected ' : '' }}value="ktp">Penerbitan KTP</option>
                    <option {{ $filter === 'kk' ? 'selected ' : '' }}value="kk">Penerbitan KK</option>
                    <option {{ $filter === 'sktm' ? 'selected ' : '' }}value="sktm">Pengajuan SKTM</option>
                    <option {{ $filter === 'kjp' ? 'selected ' : '' }}value="kjp">Pengajuan KJP</option>
                    <option {{ $filter === 'pk' ? 'selected ' : '' }}value="pk">Pindah Keluar</option>
                    <option {{ $filter === 'pd' ? 'selected ' : '' }}value="pd">Pindah Datang</option>
                    <option {{ $filter === 'um' ? 'selected ' : '' }}value="um">Pengajuan Usaha Mikro</option>
                </select>
            </div>
        </div>

        <div class="container">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Permohonan</th>
                            <th scope="col">No Surat Permohonan</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">No KTP</th>
                            <th scope="col">Status</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Wilayah RT</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permintaan as $key => $item)
                            {{-- <tr onclick="window.location = '{{ route('rw.persetujuan', ['permohonan' => $item]) }};'"
                                style="cursor: pointer;"> --}}
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                <td>{{ $item->suratPermohonan?->nosp }}</td>
                                <td>{{ $item->user?->personal?->nama }}</td>
                                <td>{{ $item->user?->personal?->tgllahir->format('d-m-Y') }}</td>
                                <td>{{ $item->user?->personal?->noktp }}</td>
                                <td>{{ $item->user?->personal?->status }}</td>
                                <td>{{ $item->user?->personal?->pekerjaan }}</td>
                                <td>{{ $item->user?->personal?->wilayahrt }}</td>
                                
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <p align="center">Data Kosong</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

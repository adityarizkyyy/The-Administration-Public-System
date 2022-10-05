<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal Permohonan</th>
            <th scope="col">No SP</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Wilayah RT</th>
            <th scope="col">No KTP</th>
            <th scope="col">Tempat Lahir</th>
            <th scope="col">Tanggal Lahir</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($permintaan as $key => $item)
            {{-- <tr onclick="window.location = '{{ route('rw.persetujuan', ['permohonan' => $item]) }};'"
                                style="cursor: pointer;"> --}}
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $item->created_at?->format('d-m-Y') }}</td>
                <td>{{ $item->suratPermohonan?->nosp }}</td>
                <td>{{ $item->user?->personal?->nama }}</td>
                <td>{{ $item->user?->personal?->wilayahrt }}</td>
                <td>{{ $item->user?->personal?->noktp }}</td>
                <td>{{ $item->user?->personal?->tempatlahir }}</td>
                <td>{{ $item->user?->personal?->tgllahir->format('d-m-Y') }}</td>
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

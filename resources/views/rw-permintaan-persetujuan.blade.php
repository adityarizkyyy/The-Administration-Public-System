@extends('layouts.main-rw')

@section('container-rw')

    <center>
        <h1 class="judul">{{ $title }}</h1>
    </center>

    <center>
        <div class="tabel-profil">
            {{-- {{ dd($permohonan->displayInformation()) }} --}}
            <table border="0">
                <tr>
                    <td>Jenis Permohonan</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">{{ $permohonan->jenisPermohonan->jenis_permohonan }}</td>
                </tr>
                <tr>
                    <td>File SK RT</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">
                        <a href="{{ route('download', ['link' => $permohonan->suratPengantar->filesk]) }}" target="_blank"
                            class="btn button-unduh btn-sm">Open File</a>
                    </td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">{{ $permohonan->user?->personal?->nama }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">{{ $permohonan->user?->personal?->tempatlahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">{{ $permohonan->user?->personal?->tgllahir->format('d-m-Y') }}</td>
                    </td>
                </tr>
                <tr>
                    <td>Nomor KTP</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">{{ $permohonan->user?->personal?->noktp }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">{{ $permohonan->user?->personal?->jk }}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">{{ $permohonan->user?->personal?->agama }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">{{ $permohonan->user?->personal?->status }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">{{ $permohonan->user?->personal?->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>Wilayah RT</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">{{ $permohonan->user?->personal?->wilayahrt }}</td>
                </tr>
                @isset($permohonan->form->displayInformation()['var'])
                    @foreach ($permohonan->form->displayInformation()['var'] as $key => $item)
                        <tr>
                            <td>{{ $item[0] }}</td>
                            <td class="titikdua">:</td>
                            <td class="identitas">{{ $item[1] }}</td>
                        </tr>
                    @endforeach
                @endisset

                @isset($permohonan->form->displayInformation()['file'])
                    @foreach ($permohonan->form->displayInformation()['file'] as $key => $item)
                        @if (is_array($item[1]))
                            @foreach ($item[1] as $datakey => $data)
                                <tr>
                                    <td>Berkas {{ $item[0] . ' ' . $datakey + 1 }}</td>
                                    <td class="titikdua">:</td>
                                    <td class="identitas">
                                        <a href="{{ route('download', ['link' => $data]) }}" target="_blank"
                                            class="btn button-unduh btn-sm">Open File</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>{{ $item[0] }}</td>
                                <td class="titikdua">:</td>
                                <td class="identitas">
                                    <a href="{{ route('download', ['link' => $item[1]]) }}" target="_blank"
                                        class="btn button-unduh btn-sm">Open File</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endisset

            </table>
        </div>
    </center>


    <center>
        <a href="{{ route('rw.sp', [$permohonan]) }}">
            <button class="button-login mt-3">
                Setujui Permohonan
            </button>
        </a><br>
        <form action="{{ route('rw.sp', ['permohonan' => $permohonan, 'status' => 'tolak']) }}" method="POST">
            @csrf
            @method('PUT')
            <button class="button-tolak mt-1 mb-5" type="submit">
                Tolak
            </button>
        </form>
    </center>

@endsection

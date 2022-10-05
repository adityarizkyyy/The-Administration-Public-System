@extends('layouts.main-rw')

@section('container-rw')
    <center>
        @if ($edit)
            <form action="{{ route('rw.profil.update', auth()->user()) }}" method="post">
                @csrf
                @method('put')
        @endif
        <h1 class="judul">{{ $title }}</h1>

        <div class="tabel-profil">
            <table border="0">
            <tr>
                    <td>Nama Lengkap</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">
                        @if ($edit)
                            <input type="text" class="form-control" id="inputNama" placeholder="Nama Lengkap"
                                value="{{ auth()->user()->personal?->nama }}" name="nama">
                        @else
                            {{ auth()->user()->personal?->nama }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">
                        @if ($edit)
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email"
                                value="{{ auth()->user()->email }}" name="email">
                        @else
                            {{ auth()->user()->email }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>Nomor Handphone</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">
                        @if ($edit)
                            <input type="text" class="form-control" id="inputHp" placeholder="Nomor Handphone"
                                value="{{ auth()->user()->personal?->nohp }}" name="nohp">
                        @else
                            {{ auth()->user()->personal?->nohp }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">
                        @if ($edit)
                            <select class="form-select" aria-label="Default select example" name="jk">
                                <option @if (auth()->user()->personal?->jk === 'Laki-laki') {{ 'selected ' }} @endif value="Laki-laki">
                                    Laki-laki</option>
                                <option @if (auth()->user()->personal?->jk === 'Perempuan') {{ 'selected ' }} @endif value="Perempuan">
                                    Perempuan</option>
                            </select>
                        @else
                            {{ auth()->user()->personal?->jk }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>Agama</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">
                        @if ($edit)
                        <select class="form-select" aria-label="Default select example" name="agama">
                            <option @if (auth()->user()->personal?->agama === 'Islam') {{ 'selected ' }} @endif value="Islam">Islam</option>
                            <option @if (auth()->user()->personal?->agama === 'Protestan') {{ 'selected ' }} @endif value="Protestan">Protestan</option>
                            <option @if (auth()->user()->personal?->agama === 'Katolik') {{ 'selected ' }} @endif value="Katolik">Katolik</option>
                            <option @if (auth()->user()->personal?->agama === 'Hindu') {{ 'selected ' }} @endif value="Hindu">Hindu</option>
                            <option @if (auth()->user()->personal?->agama === 'Buddha') {{ 'selected ' }} @endif value="Buddha">Buddha</option>
                            <option @if (auth()->user()->personal?->agama === 'Khonghucu') {{ 'selected ' }} @endif value="Khonghucu">Khonghucu</option>
                        </select>
                        @else
                            {{ auth()->user()->personal?->agama }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>Nomor KTP</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">
                        @if ($edit)
                            <input type="text" class="form-control" id="inputKtp" placeholder="Nomor KTP"
                                value="{{ auth()->user()->personal?->noktp }}" name="noktp">
                        @else
                            {{ auth()->user()->personal?->noktp }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">
                        @if ($edit)
                            <input type="text" class="form-control" id="inputtempatlahir" placeholder="Tempat Lahir"
                                value="{{ auth()->user()->personal?->tempatlahir }}" name="tempatlahir">
                        @else
                            {{ auth()->user()->personal?->tempatlahir }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">
                        @if ($edit)
                            <input type="date" class="form-control" id="inputtanggallahir" placeholder="Tanggal Lahir"
                                value="{{ auth()->user()->personal?->tgllahir->format('Y-m-d') }}" name="tgllahir">
                        @else
                            {{ auth()->user()->personal?->tgllahir->format('d-m-Y') }}
                        @endif
                    </td>
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">
                        @if ($edit)
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option @if (auth()->user()->personal?->status === 'Belum Menikah') {{ 'selected ' }} @endif
                                    value="Belum Menikah">
                                    Belum Menikah</option>
                                <option @if (auth()->user()->personal?->status === 'Sudah Menikah') {{ 'selected ' }} @endif
                                    value="Sudah Menikah">Sudah Menikah</option>
                                <option @if (auth()->user()->personal?->status === 'Cerai Mati') {{ 'selected ' }} @endif value="Cerai Mati">Cerai Mati</option>
                                <option @if (auth()->user()->personal?->status === 'Cerai Hidup') {{ 'selected ' }} @endif value="Cerai Hidup">Cerai Hidup</option>
                            </select>
                        @else
                            {{ auth()->user()->personal?->status }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">
                        @if ($edit)
                            <input type="text" class="form-control" id="inputpekerjaan" placeholder="Pekerjaan"
                                value="{{ auth()->user()->personal?->pekerjaan }}" name="pekerjaan">
                        @else
                            {{ auth()->user()->personal?->pekerjaan }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Wilayah RT</td>
                    <td class="titikdua">:</td>
                    <td class="identitas">
                        @if ($edit)
                            <!-- <input type="text" class="form-control" id="inputwilayahrt" placeholder="Wilayah RT"
                                value="{{ auth()->user()->personal?->wilayahrt }}" name="wilayahrt"> -->
                            
                            <select class="form-select" aria-label="Default select example" name="wilayahrt">
                                <option @if (auth()->user()->personal?->wilayahrt === '01') {{ 'selected ' }} @endif value="01">01</option>
                                <option @if (auth()->user()->personal?->wilayahrt === '02') {{ 'selected ' }} @endif value="02">02</option>
                                <option @if (auth()->user()->personal?->wilayahrt === '03') {{ 'selected ' }} @endif value="03">03</option>
                                <option @if (auth()->user()->personal?->wilayahrt === '04') {{ 'selected ' }} @endif value="04">04</option>
                                <option @if (auth()->user()->personal?->wilayahrt === '05') {{ 'selected ' }} @endif value="05">05</option>
                                <option @if (auth()->user()->personal?->wilayahrt === '06') {{ 'selected ' }} @endif value="06">06</option>
                                <option @if (auth()->user()->personal?->wilayahrt === '07') {{ 'selected ' }} @endif value="07">07</option>
                                <option @if (auth()->user()->personal?->wilayahrt === '08') {{ 'selected ' }} @endif value="08">08</option>
                                <option @if (auth()->user()->personal?->wilayahrt === '09') {{ 'selected ' }} @endif value="09">09</option>
                                <option @if (auth()->user()->personal?->wilayahrt === '10') {{ 'selected ' }} @endif value="10">10</option>
                                <option @if (auth()->user()->personal?->wilayahrt === '11') {{ 'selected ' }} @endif value="11">11</option>
                                <option @if (auth()->user()->personal?->wilayahrt === '12') {{ 'selected ' }} @endif value="12">12</option>
                                <option @if (auth()->user()->personal?->wilayahrt === '13') {{ 'selected ' }} @endif value="13">13</option>
                            </select>
                        @else
                            {{ auth()->user()->personal?->wilayahrt }}
                        @endif
                    </td>
                </tr>
            </table>
            @if ($edit)
                @if ($edit)
                    <button type="submit" class="pro-button mt-3">Simpan Perubahan</button>
                    </form>
                @endif
            @else
                <a href="{{ route('rw.profil', ['edit' => true]) }}">
                    <button class="pro-button mt-5">Ubah Profil</button>
                </a>
            @endif
        </div>

        <!-- <a href="{{ route('rw.index') }}">
            <button class="pro-button">Kembali Ke HOME</button>
        </a> -->
    </center>
@endsection

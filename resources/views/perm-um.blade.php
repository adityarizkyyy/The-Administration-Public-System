@extends('layouts.main')

@section('container')
    <div class="main-box-form">
        <h1 class="mb-5" align="center">{{ $title }}</h1>
        <div>
            <div>
                <div class="sec-box-form">
                    <!-- col-lg-4 : colom-large(panjang)-8-->
                    <form action="{{ route('form-perm', ['form' => 'um']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat Rumah</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="alamat" required>
                        </div>
                        <div class="mb-3">
                            <!-- option -->
                            <label for="exampleInputEmail1" class="form-label">Jenis Permohonan</label>
                            <select class="form-select" aria-label="Default select example" name="jenispermohonan">
                                <option value="1">Perorangan</option>
                                <option value="2">Perusahaan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NPWP (Nomor Pokok Wajib Pajak)</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="nonpwp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NIB (Nomor Induk Berusaha)</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="nonib">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Usaha</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="namausaha" required>
                        </div>
                        <div class="mb-3">
                            <!-- option -->
                            <label for="exampleInputEmail1" class="form-label">Kegiatan Usaha</label>
                            <select class="form-select" aria-label="Default select example" name="kegiatanusaha">
                                <option value="Perdagangan">Perdagangan</option>
                                <option value="Produksi">Produksi</option>
                                <option value="Jasa">Jasa</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jumlah Tenaga Kerja</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="jumlahtenagakerja" required>
                        </div>
                        <div class="mb-3">
                            <!-- option -->
                            <label for="exampleInputEmail1" class="form-label">Jenis Rekomendasi</label>
                            <select class="form-select" aria-label="Default select example" name="jenisrekomendasi">
                                <option value="Bukan Binaan">Bukan Binaan</option>
                                <option value="Binaan Dinas">Binaan Dinas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor Surat Rekomendasi <span
                                    class="notice"> *Jika Binaan Dinas</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="nosuratrekomendasi">
                        </div>
                        <div class="mb-3">
                            <!-- option -->
                            <label for="exampleInputEmail1" class="form-label">Status Lokasi Usaha</label>
                            <select class="form-select" aria-label="Default select example" name="statuslokasiusaha">
                                <option value="Menetap">Menetap</option>
                                <option value="Berpindah-pindah">Berpindah-pindah</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <!-- option -->
                            <label for="exampleInputEmail1" class="form-label">Status Kepemilikan Sarana Usaha</label>
                            <select class="form-select" aria-label="Default select example"
                                name="statuskepemilikanusaha">
                                <option value="Hak Milik">Hak Milik</option>
                                <option value="Hak Pinjam/Sewa">Hak Pinjam/Sewa</option>
                                <option value="Hak Pakai">Hak Pakai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Luas Lokasi</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="luaslokasi" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Lama Usaha</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="lamausaha" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alat Utama Usaha</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="alatutamausaha" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kelurahan Tempat Usaha</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="kelurahanusaha" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kecamatan Tempat Usaha</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="kecamatanusaha" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kota Tempat Usaha</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="kotausaha" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Omset Perbulan Sebelum Covid-19</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="omsetsebelumcovid" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Omset Perbulan Sesudah Covid-19</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="omsetsetelahcovid" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Media Pemasaran</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="mediapemasaran" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Pas Foto Pemohon</label>
                            <input class="form-control" type="file" id="formFile" name="filepasfoto" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">KTP Pemohon</label>
                            <input class="form-control" type="file" id="formFile" name="filektp" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Kartu Keluarga Pemohon</label>
                            <input class="form-control" type="file" id="formFile" name="filekk" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Foto Tempat Usaha</label>
                            <input class="form-control" type="file" id="formFile" name="filefototempatusaha" required>
                        </div>
                        <div class="mb-5">
                            <label for="formFile" class="form-label">Surat Keterangan Dari Pasar Jaya <span
                                    class="notice"> *Jika Berlokasi di Pasar Jaya</span></label>
                            <input class="form-control" type="file" id="formFile" name="filesuratketpasarjaya">
                        </div>

                        <span>
                            <center>
                                <button type="submit" class="sec-button">Ajukan Permohonan</button>
                            </center>
                        </span>

                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection

@extends('layouts.main')

@section('container')
    <div class="main-box-form">
        <h1 class="mb-5" align="center">{{ $title }}</h1>
        <div>
            <div>
                <div class="sec-box-form">
                    <!-- col-lg-4 : colom-large(panjang)-8-->
                    <form action="{{ route('form-perm', ['form' => 'pk']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="namakepalakeluarga" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat Sekarang</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="alamatsekarang" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat Tujuan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="alamattujuan" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jumlah Anggota Pindah</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="jumlahanggotapindah" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">KTP Pemohon</label>
                            <input class="form-control" type="file" id="formFile" name="filektp">
                        </div>
                        <div class="mb-5">
                            <label for="formFile" class="form-label">Kartu Keluarga</label>
                            <input class="form-control" type="file" id="formFile" name="filekk" required>
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

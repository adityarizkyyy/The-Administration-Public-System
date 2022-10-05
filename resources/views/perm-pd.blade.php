@extends('layouts.main')

@section('container')
    <div class="main-box-form">
        <h1 class="mb-5" align="center">{{ $title }}</h1>
        <div>
            <div>
                <div class="sec-box-form">
                    <!-- col-lg-4 : colom-large(panjang)-8-->
                    <form action="{{ route('form-perm', ['form' => 'pd']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="formFile" class="form-label">KTP Pemohon</label>
                            <input class="form-control" type="file" id="formFile" name="filektp" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Kartu Keluarga</label>
                            <input class="form-control" type="file" id="formFile" name="filekk" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Surat SKP (Surat Keterangan Pindah) dari
                                DUKCAPIL</label>
                            <input class="form-control" type="file" id="formFile" name="fileskp" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Formulir Warga Penjamin <span
                                    class="notice">*Bermaterai 10 Ribu</span></label>
                            <input class="form-control" type="file" id="formFile" name="fileformpenjamin" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">KTP Penjamin</label>
                            <input class="form-control" type="file" id="formFile" name="filektppenjamin" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">KK Penjamin</label>
                            <input class="form-control" type="file" id="formFile" name="filekkpenjamin" required>
                        </div>
                        <div class="mb-5">
                            <label for="formFile" class="form-label">Draft Kartu Keluarga</label>
                            <input class="form-control" type="file" id="formFile" name="filedraftkk" required>
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

@extends('layouts.main')

@section('container')
    <div class="main-box-form">
        <h1 class="mb-5" align="center">{{ $title }}</h1>
        <div>
            <div>
                <div class="sec-box-form">
                    <!-- col-lg-4 : colom-large(panjang)-8-->
                    <form action="{{ route('form-perm', ['form' => 'kjp']) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="formFile" class="form-label">KTP Ibu</label>
                            <input class="form-control" type="file" id="formFile" name="filektpibu" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Kartu Keluarga</label>
                            <input class="form-control" type="file" id="formFile" name="filekk" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Instrumen KJP dari Sekolah</label>
                            <input class="form-control" type="file" id="formFile" name="filekjp" required>
                        </div>
                        <div class="mb-5">
                            <label for="formFile" class="form-label">Formulir SKTM <span
                                    class="notice">*Bermaterai 10 Ribu</span></label>
                            <input class="form-control" type="file" id="formFile" name="filesktm" required>
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

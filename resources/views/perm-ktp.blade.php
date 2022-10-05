@extends('layouts.main')

@section('container')
    <div class="main-box-form">
        <h1 class="mb-5" align="center">{{ $title }}</h1>
        <div>
            <div>
                <div class="sec-box-form">
                    <!-- col-lg-4 : colom-large(panjang)-8-->
                    <form action="{{ route('form-perm', ['form' => 'ktp']) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Kartu Keluarga</label>
                            <input class="form-control" type="file" id="formFile" name="filekk" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Akta Kelahiran</label>
                            <input class="form-control" type="file" id="formFile" name="fileakta" required>
                        </div>
                        <div class="mb-5">
                            <label for="formFile" class="form-label">KTP Kepala Keluarga</label>
                            <input class="form-control" type="file" id="formFile" name="filektpkepalart" required>
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

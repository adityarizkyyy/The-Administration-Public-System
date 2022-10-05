@extends('layouts.main-rt')

@section('container-rt')
    <div class="main-box-form">
        <center>
            <h1 class="judul">{{ $title }}</h1>
            <h4 class="notice">{{ $notice }}</h4>
        </center>
        <div>
            <div>
                <div class="sec-box-form">
                    <!-- col-lg-4 : colom-large(panjang)-8-->
                    <form action="{{ route('rt.sp', ['permohonan' => $permohonan]) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-5 mt-5">
                            <label for="formFile" class="form-label">Scan Surat Pengantar</label>
                            <input class="form-control" type="file" id="formFile" name="filesk" required>
                        </div>

                        <span>
                            <center>
                                <!-- ketika rt klik upload sk, status progres juga diupdate jadi : Validasi pertama berhasil-->
                                <button type="submit" class="sec-button mt-5 ">Upload</button>
                            </center>
                        </span>

                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection

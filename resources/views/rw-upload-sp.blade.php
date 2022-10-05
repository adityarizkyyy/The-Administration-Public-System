@extends('layouts.main-rw')

@section('container-rw')
    <div class="main-box-form">
        <center>
            <h1 class="judul">{{ $title }}</h1>
            <h4 class="notice">{{ $notice }}</h4>
        </center>
        <div>
            <div>
                <div class="sec-box-form">
                    <form action="{{ route('rw.sp', [$permohonan]) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 mt-5">
                            <label for="exampleInputEmail1" class="form-label">Nomor SP</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="nosp" required>
                        </div>
                        <div class="mb-5">
                            <label for="formFile" class="form-label">Surat Permohonan</label>
                            <input class="form-control" type="file" id="formFile" name="filesp" required>
                        </div>

                        <span>
                            <center>
                                <!-- ketika rw klik upload sp, status progres juga diupdate jadi : SP telah disetujui, dan kirim email ke email yg terdaftar : 'SP telah disetujui'-->
                                <button type="submit" class="sec-button mt-5 ">Upload</button>
                            </center>
                        </span>

                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection

@extends('layouts.main')

@section('container')
    <div class="main-box-form">
        <h1 class="mb-5" align="center">{{ $title }}</h1>
        <div>
            <div>
                <div class="sec-box-form">
                    <!-- col-lg-4 : colom-large(panjang)-8-->
                    <form action="{{ route('form-perm', ['form' => 'kk']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="namakepalakeluarga" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Draft KK</label>
                            <input class="form-control" type="file" id="formFile" name="filedraftkk" required>
                        </div>
                        <div id="ktpList">
                            <div class="">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">KTP Anggota 1</label>
                                    <input class="form-control" type="file" id="formFile" name="filektpanggota[]">
                                
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Akta Kelahiran Anggota 1</label>
                                    <input class="form-control" type="file" id="formFile" name="fileaktaanggota[]">
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-danger d-none" role="alert" id="alertMax">
                            Maksimal jumlah anggota adalah 10 orang
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary w-100" type="button" id="addButton">+</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-secondary h-100 w-100 d-none" id="minusButton">-</button>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Buku Nikah <span class="notice">*Jika Sudah
                                    Menikah</span></label>
                            <input class="form-control" type="file" id="formFile" name="filebukunikah">
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
    <script>
        var minus = document.getElementById('minusButton');
        minus.addEventListener('click', function() {
            var total = ktpList.childElementCount;
            var alert = document.getElementById('alertMax');
            if (total > 1) {
                ktpList.removeChild(ktpList.lastElementChild);
                total--;
                if (total == 1) {
                    minus.classList.add('d-none');
                }
            }

            if (total >= 10) {
                alert.classList.remove("d-none");
            } else {
                alert.classList.add("d-none");
            }
        });
        addBtn = document.getElementById('addButton');
        addBtn.addEventListener('click', function() {
            var input = document.createElement('div');
            var ktpList = document.getElementById('ktpList');
            var total = ktpList.childElementCount;
            var alert = document.getElementById('alertMax');

            if (total >= 10) {
                alert.classList.remove("d-none");
                return;
            } else {
                alert.classList.add("d-none");
            }

            if (total >= 1) {
                minus.classList.remove("d-none");
            } else {
                minus.classList.add("d-none");
            }
            input.className = 'mb-3';
            input.innerHTML =
                `
                <div class="">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">KTP Anggota ${total+1}</label>
                                    <input class="form-control" type="file" id="formFile" name="filektpanggota[]">
                                
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Akta Kelahiran Anggota ${total+1}</label>
                                    <input class="form-control" type="file" id="formFile" name="fileaktaanggota[]">
                                </div>
                            </div>
                `;
            document.getElementById('ktpList').appendChild(input);
        });
    </script>
@endsection

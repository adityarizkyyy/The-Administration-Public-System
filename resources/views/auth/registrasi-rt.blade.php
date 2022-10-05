<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Link CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Bostrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <title>APEM15 | Daftar</title>
</head>

<body class="body-login">
    <form action="{{ route('register') }}" method="post">
        @csrf
        @method('post')
        <div class="font-content d-flex flex-column justify-content-center align-items-center">
            <img class="jayaraya" src="{{ asset('img/' . $img) }}" alt="jayaraya">
            <center>
            <p>
                <span class="main-word-login">DAFTAR SEBAGAI RT</span>
                <br>
                {{ $kata2 }}
            </p>
            </center>
            <div class="login">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label><br>
                    <input class="form-control" type="text" required="" name="nama">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label><br>
                    <input class="form-control" type="email" required="" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kata Sandi</label><br>
                    <input class="form-control" type="password" required="" name="password">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label><br>
                    <select class="form-select" aria-label="Default select example" name="jk">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Agama</label><br>
                    <select class="form-select" aria-label="Default select example" name="agama">
                        <option value="Islam">Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomor KTP</label><br>
                    <input class="form-control" type="text" required="" name="noktp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label><br>
                    <input class="form-control" type="text" required="" name="tempatlahir">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label><br>
                    <input class="form-control" type="date" required="" name="tgllahir">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Status</label><br>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Sudah Menikah">Sudah Menikah</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Pekerjaan</label><br>
                    <input class="form-control" type="text" required="" name="pekerjaan">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Wilayah RT</label><br>
                    <select class="form-select" aria-label="Default select example" name="wilayahrt">
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomor Handphone</label><br>
                    <input class="form-control" type="text" required="" name="nohp">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="hidden" required="" name="role" value="rt">
                </div>
                <div class="mb-3">
                    <input class="button-login" type="submit" value="DAFTAR">
                </div>
                <center>
                <p class="font-content">Sudah memiliki akun?</p>
                </center>
                <a href="{{ route('login') }}">
                    <button class="button-regist" type="button">LOGIN SEKARANG</button>
                </a>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>APEM15 | Login</title>
</head>

<body class="body-login">
    <center>
        <form action="{{ route('login') }}" method="post">
            @csrf
            @method('post')
            <div class="font-content">
                <img class="jayaraya" src="img/{{ $img }}" alt="jayaraya">
                <p>
                    <span class="main-word-login">{{ $kata1 }}</span>
                    <br>
                    {{ $kata2 }}
                </p>

                <div class="login">
                    <div class="input-group">
                        <input class="kotak-input" type="email" placeholder="Masukkan Email" required="" name="email">
                    </div>
                    <div class="input-group">
                        <input class="kotak-input" type="password" placeholder="Masukkan Kata Sandi" required=""
                            name="password">
                    </div>
                    <div class="input-group2">
                        <input class="button-login" style="cursor:pointer" type="submit" value="LOGIN">
                    </div>
                </div>
            </div>
        </form>

        <p class="font-content">Belum memiliki akun?</p>
        <a href="{{ route('register') }}">
            <button class="button-regist" style="cursor:pointer" type="button">DAFTAR SEKARANG</button>
        </a>
    </center>
</body>

</html>

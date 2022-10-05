<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Link CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Bostrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <title>APEM15 | {{ $title }}</title>
</head>

<body>

    @include('partials.navbar-rt')
    @if ($message = Session::get('success'))
        {{-- <div class="alert alert-success" role="alert">
            {{ $message }}
        </div> --}}

        {{-- Di bawah Modal Version vs Di bawah Alert Version --}}

        <div class="modal fade" id="modalSuccess" tabindex="-1" aria-labelledby="modalSuccessLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body text-center">
                        <h1 style="font-size: 6em"><i class="bi bi-check-circle-fill text-success text-bold"></i></h1>
                        <h3>Success</h3>
                        <p>{{ $message }}</p>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    @endif
    @if ($message = Session::get('error'))
        {{-- <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div> --}}

        {{-- Di bawah Modal Version vs Di bawah Alert Version --}}

        <div class="modal fade" id="modalError" tabindex="-1" aria-labelledby="modalErrorLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body text-center">
                        <h1 style="font-size: 6em"><i class="bi bi-x-circle-fill text-danger text-bold"></i></h1>
                        <h3>Error</h3>
                        <p>{{ $message }}</p>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    @endif
    <div class="container mt-4">
        <!-- mt : margin top -->
        @yield('container-rt')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @if ($message = Session::get('success'))
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('modalSuccess'))
            // var modalToggle = document.getElementById('modalSuccess') // relatedTarget
            myModal.show()
        </script>
    @endif
    @if ($message = Session::get('error'))
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('modalError'))
            // var modalToggle = document.getElementById('modalError') // relatedTarget
            myModal.show()
        </script>
    @endif
</body>

</html>

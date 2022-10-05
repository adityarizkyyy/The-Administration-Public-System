<nav class="navbar navbar-expand-lg navbar-light bg-none">
    <div class="container mt-2">
        <a class="navbar-brand" href="{{ route('rw.index') }}"><span class="blue"><b>APEM15</b></span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               
                <a class="nav-link {{ ($title === 'Dashboard') ? 'active' : ''}}" aria-current="page" 
                    href="{{ route('rw.index') }}"><span class="color-link-nav">Home</span></a>

                <a class="nav-link {{ ($title === 'Permintaan Persetujuan Permohonan') ? 'active' : ''}}" 
                    href="{{ route('rw.permintaan') }}"><span class="color-link-nav">Permintaan</span></a>
                
                <a class="nav-link {{ ($title === 'Laporan') ? 'active' : ''}}" aria-current="page" 
                    href="{{ route('rw.laporan') }}"><span class="color-link-nav">Laporan</span></a>

                <a class="nav-link {{ ($title === 'Profil') ? 'active' : ''}}" 
                    href="{{ route('rw.profil') }}"><span class="color-link-nav">Profil</span></a>

            </ul>

            @auth
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><span class="color-link-nav"><i
                                    class="bi bi-box-arrow-right"></i> Logout</span></a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><span class="color-link-nav"><i
                                    class="bi bi-box-arrow-in-right"></i> Login</span></a>
                    </li>
                </ul>
            @endauth

        </div>
</nav>

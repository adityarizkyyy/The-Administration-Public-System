<nav class="navbar navbar-expand-lg navbar-light bg-none">
    <div class="container mt-2">
        <a class="navbar-brand" href="/"><span class="blue"><b>APEM15</b></span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                
                <a class="nav-link {{ ($title === 'Home') ? 'active' : ''}}" aria-current="page" href="/"><span
                            class="color-link-nav">Home</span></a>

                <a class="nav-link 
                {{ ($title === 'Permohonan') ? 'active' : ''}} 
                {{ ($title === 'Permohonan Penerbitan KTP') ? 'active' : ''}}
                {{ ($title === 'Permohonan Penerbitan KK') ? 'active' : ''}}
                {{ ($title === 'Permohonan Pengajuan SKTM') ? 'active' : ''}}
                {{ ($title === 'Permohonan Pengajuan KJP') ? 'active' : ''}}
                {{ ($title === 'Permohonan Pindah Keluar') ? 'active' : ''}}
                {{ ($title === 'Permohonan Pindah Datang') ? 'active' : ''}}
                {{ ($title === 'Permohonan Pengajuan Usaha Mikro') ? 'active' : ''}}" href="permohonan"><span
                            class="color-link-nav">Permohonan</span></a>
                
                <a class="nav-link {{ ($title === 'Tata Cara') ? 'active' : ''}}" href="/tatacara"><span
                            class="color-link-nav">Tata Cara</span></a>
                @auth
                <a class="nav-link {{ ($title === 'Riwayat') ? 'active' : ''}}" href="{{ route('riwayat') }}"><span
                                class="color-link-nav">Riwayat</span></a>
                <a class="nav-link {{ ($title === 'Profil') ? 'active' : ''}}" href="/profil"><span
                                class="color-link-nav">Profil</span></a>
                @endauth


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

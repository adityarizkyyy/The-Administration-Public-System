@extends('layouts.main-rw')

@section('container-rw')
    <div>
        <div>
            <a href="{{ route('rw.permintaan') }}">
                <button class="main-button mt-3">Permintaan
                    <span class="jum-perm-button">
                        {{ $count }}
                        <!-- 10 di kiri = total jumlah permintaan persetujuan yang masuk (hasil terusan dari sk RT yg udh di upload) -->
                    </span>
                </button>
            </a><br>
        </div>


        <div>
            <section class="layer-slide-rw mt-1">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($done as $key => $item)
                            <div class="swiper-slide">
                                <div class="card-box">
                                    <div class="content-card-box">
                                        <h1>{{ $item->jenis_permohonan }}</h1>
                                        <p class="total-sp">
                                            <!-- total sp = total dari Surat Permohonan yang udh di upload sama rw (disesuikan jenisnya) -->
                                            {{ $item->permohonan_count }}
                                            <!-- 5 di kiri ini = contoh total SP yang udh di upload sama rw -->
                                        </p>
                                        <a href="{{ route('rw.laporan', ['filter' => $item->kode_permohonan]) }}">
                                            <button class="detail-sp">
                                                detail>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>


        </div>
    </div>
@endsection

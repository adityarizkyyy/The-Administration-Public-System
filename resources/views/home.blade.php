@extends('layouts.main')

@section('container')
    <div class="container_home">
        <div class="content1_home">
            <h1 class="blue"><b>{{ $kata1 }}</b></h1>
            <h1 class="blue"><b>{{ $kata2 }}</b></h1>
            <h5 class="blue">{{ $kata3 }}</h5>
            <h5 class="blue">{{ $kata4 }}</h5>
            <p class="pad-top-home"></p>
            <a href="{{ route('permohonan') }}"><button class="main-button">Ajukan Permohonan</button></a>
            <!-- <a href="{{ route('tatacara') }}"><button class="tanya-button">?</button></a> -->
        </div>

        <div class="content2_home">
            <img class="mainchar" src="img/{{ $img }}" alt="mainchar">
        </div>
    </div>

    

@endsection

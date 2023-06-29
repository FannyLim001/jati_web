@php
    use Carbon\Carbon;
@endphp

@extends('layout.guest.guest_layout')

@section('content')
    <div class="col-lg-8">
        <div class="arsip_content">
            <h1>Arsip</h1>
            <br>
            @foreach ($jurnal_vol as $year => $jurnals)
                <div class="arsip_tgl">
                    {{ $year }}
                </div>
                <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($jurnals as $jurnal)
                                <div class="col-lg-2">
                                    <img src="{{ asset('img') }}/cover_jurnal.png" class="cover-jurnal img-fluid"
                                        alt="banner">
                                </div>
                                <div class="col-lg-10">
                                    <a class="card-subtitle mb-2" href="/arsip_volume/{{ $jurnal->id }}">{{ $jurnal->nama_volume }}</a>
                                    <p>{{ $jurnal->desc_volume }}</p>
                                </div>
                                @endforeach
                            </div>
                            <br>
                        </div>
                    </div>
                    <br>
            @endforeach
            <br>
        </div>
        <br>
    </div>
@endsection

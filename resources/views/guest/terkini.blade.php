@php
    $names = $list_kontributor->pluck('nama')->implode(', ');
@endphp

@extends('layout.guest.guest_layout')

@section('content')
<div class="col-lg-8">
    <div class="terkini_content">
        <div class="terkini_judul">
            <h1>Terkini</h1>
        </div>
        <div class="terkini_volume">
            {{ $jurnal_vol->nama_volume }}
        </div>
        <br>
        <div class="terkini_text">
            <p>{{ $jurnal_vol->desc_volume }}</p>
        </div>
        <div class="terkini_list">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Isi</h5>
                    @if ($list_jurnal->isEmpty())
                            <p class="card-text">Tidak ada jurnal yang ditemukan</p>
                        @else
                            @foreach ($list_jurnal as $l)
                                <div class="row">
                                    <div class="col-lg-10">
                                        <p class="card-text"><i class="fa-solid fa-book fa-xl"
                                                style="color: #469be9;"></i>&nbsp;&nbsp;
                                            <a href="/arsip_detail/{{ $l->id }}">{{ $l->judul }}</a>
                                        </p>
                                        <h6 class="card-subtitle mb-2">{{ $names }}</h6>
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="card-button">
                                            <a href="{{ asset('storage/pdf/' . $l->file_pdf) }}"
                                                download="{{ $l->file_pdf }}.pdf">
                                                <i class="fa-solid fa-file-pdf"></i>&nbsp;&nbsp;PDF</a>
                                        </button>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        @endif
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
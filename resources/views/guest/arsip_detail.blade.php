@php
    $names = $kontributor->pluck('nama')->implode(', ');
@endphp

@extends('layout.guest.guest_layout')

@section('content')
    <div class="col-lg-8">
        <div class="detail_content">
            <div class="row">
                <div class="col-10">
                    <div class="detail_judul">
                        <h1>{{ $jurnal->judul }}</h1>
                    </div>
                </div>
                <div class="col-2">
                    <button class="pdf_button">
                        <a href="{{ asset('storage/pdf/' . $jurnal->file_pdf) }}" download="{{ $jurnal->file_pdf }}.pdf">
                        <i class="fa-solid fa-file-pdf"></i>&nbsp;&nbsp;PDF</a></button>
                </div>
            </div>
            <br>
            <div class="detail_card">
                <div class="card">
                    <div class="card-header">
                        <h4>Penulis</h4>
                        <p>{{ $names }}</p>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Abstrak</h4>
                        <p>
                            {{ $jurnal->abstrak }}
                        </p>
                        <h4 class="card-title">Teks Lengkap</h4>
                        <a href="{{ asset('storage/pdf/' . $jurnal->file_pdf) }}" download="{{ $jurnal->file_pdf }}.pdf" class="pdf_link">PDF</a>
                        <br><br>
                        <div class="detail_ref">
                            <h4 class="card-title">Referensi</h4>
                            @foreach ($reference as $r)
                                <p>
                                    {{ $r->referensi }}
                                </p>
                            @endforeach

                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection

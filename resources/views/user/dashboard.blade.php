@extends('layout.user.user_layout')

@section('content')
<div class="col-lg-8">
    <div class="tentang_content">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <img src="{{ asset('img') }}/cover_jurnal.png" class="cover-jurnal img-fluid"
                    alt="banner">
            </div>
            <div class="col-lg-8 col-md-6 col-sm-6">
                <div class="tentang_judul">
                    <h1>Tentang JATI</h1>
                </div>
                <div class="tentang_text">
                    <p>Jurnal A Teknik Informatika (JATI) adalah jurnal nasional yang diterbitkan oleh
                        Program Studi
                        Teknik Informatika (PSTI), Politeknik Caltex Riau (PCR), Pekanbaru sejak tahun 2023
                    </p>
                </div>
                <div class="tentang_button">
                    <button class="btn_blue"><a href="/tentang_kami">Selengkapnya</a></button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="terkini_content">
        <div class="terkini_judul">
            <h1>Terkini</h1>
        </div>
        <div class="terkini_volume">
            Vol 7, No 2 (2023)
        </div>
        <br>
        <div class="terkini_text">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet fermentum urna. Duis
                nec eros ex.
                Praesent a euismod justo. Nullam dignissim, lectus sed iaculis placerat, quam odio sagittis
                leo,
                tempor porta lorem lectus sed lectus. Etiam semper, neque at mattis ultricies, dolor mi
                congue risus,
                non vehicula libero risus ac erat. Integer nec arcu augue.</p>
        </div>
        <div class="terkini_list">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Isi</h5>
                    <div class="row">
                        <div class="col-lg-10">
                            <p class="card-text"><i class="fa-solid fa-book fa-xl"
                                    style="color: #469be9;"></i>&nbsp;&nbsp;
                                <a href="/arsip_detail">Pengembangan Game gacha menggunakan Unity</a>
                            </p>
                            <h6 class="card-subtitle mb-2">Muhammad Ilham, Kaveh</h6>
                            <a href="http://dx.doi.org/10.25126/jati.90112345" class="card-link">DOI:
                                http://dx.doi.org/10.25126/jati.90112345</a>
                        </div>
                        <div class="col-lg-2">
                            <button class="card-button"><a href="/.pdf"><i
                                        class="fa-solid fa-file-pdf"></i>&nbsp;&nbsp;PDF</a></button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-10">
                            <p class="card-text"><i class="fa-solid fa-book fa-xl"
                                style="color: #469be9;"></i>&nbsp;&nbsp;
                            <a href="/arsip_detail">Pengembangan Game gacha menggunakan Unity</a>
                        </p>
                            <h6 class="card-subtitle mb-2">Muhammad Ilham, Kaveh</h6>
                            <a href="http://dx.doi.org/10.25126/jati.90112345" class="card-link">DOI:
                                http://dx.doi.org/10.25126/jati.90112345</a>
                        </div>
                        <div class="col-lg-2">
                            <button class="card-button"><a href="/.pdf"><i
                                        class="fa-solid fa-file-pdf"></i>&nbsp;&nbsp;PDF</a></button>
                        </div>
                    </div>

                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
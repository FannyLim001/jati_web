@extends('layout.user.user_layout')

@section('content')
<div class="col-lg-8">
    <div class="arsip_content">
        <h1>Arsip</h1>
        <br>
        <div class="arsip_tgl">
            2023
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                        <img src="{{ asset('img') }}/cover_jurnal.png" class="cover-jurnal img-fluid"
                    alt="banner">
                    </div>
                    <div class="col-lg-10">
                        <a class="card-subtitle mb-2" href="/arsip_volume">Vol 7, No 2(2023)</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet fermentum urna. Duis nec eros ex. Praesent a euismod justo. Nullam dignissim, lectus sed iaculis placerat, quam odio sagittis leo, tempor porta lorem lectus sed lectus. Etiam semper, neque at mattis ultricies, dolor mi congue risus, non vehicula libero risus ac erat. Integer nec arcu augue.</p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-2">
                        <img src="{{ asset('img') }}/cover_jurnal.png" class="cover-jurnal img-fluid"
                    alt="banner">
                    </div>
                    <div class="col-lg-10">
                        <a class="card-subtitle mb-2" href="/vol">Vol 7, No 2(2023)</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet fermentum urna. Duis nec eros ex. Praesent a euismod justo. Nullam dignissim, lectus sed iaculis placerat, quam odio sagittis leo, tempor porta lorem lectus sed lectus. Etiam semper, neque at mattis ultricies, dolor mi congue risus, non vehicula libero risus ac erat. Integer nec arcu augue.</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="arsip_tgl">
            2023
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                        <img src="{{ asset('img') }}/cover_jurnal.png" class="cover-jurnal img-fluid"
                    alt="banner">
                    </div>
                    <div class="col-lg-10">
                        <a class="card-subtitle mb-2" href="/vol">Vol 7, No 2(2023)</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet fermentum urna. Duis nec eros ex. Praesent a euismod justo. Nullam dignissim, lectus sed iaculis placerat, quam odio sagittis leo, tempor porta lorem lectus sed lectus. Etiam semper, neque at mattis ultricies, dolor mi congue risus, non vehicula libero risus ac erat. Integer nec arcu augue.</p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-2">
                        <img src="{{ asset('img') }}/cover_jurnal.png" class="cover-jurnal img-fluid"
                    alt="banner">
                    </div>
                    <div class="col-lg-10">
                        <a class="card-subtitle mb-2" href="/vol">Vol 7, No 2(2023)</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet fermentum urna. Duis nec eros ex. Praesent a euismod justo. Nullam dignissim, lectus sed iaculis placerat, quam odio sagittis leo, tempor porta lorem lectus sed lectus. Etiam semper, neque at mattis ultricies, dolor mi congue risus, non vehicula libero risus ac erat. Integer nec arcu augue.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection
@extends('layout.user.user_layout')

@section('content')
    <div class="col-lg-8">
        <div class="index_content">
            <div class="index_judul">
                <h1>Indeks</h1>
            </div>
            <div class="index_list">
                <img src="{{ asset('img') }}/sinta_logo.png" class="img-fluid" alt="sinta">&nbsp;&nbsp;&nbsp;
                <img src="{{ asset('img') }}/google_scholar_logo.png" class="img-fluid" alt="google">&nbsp;&nbsp;&nbsp;
                <img src="{{ asset('img') }}/doaj_logo.png" class="img-fluid" alt="doaj">
            </div>
        </div>
    </div>
@endsection

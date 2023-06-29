@extends('layout.guest.guest_layout')

@section('content')
    <div class="col-lg-8">
        <div class="editorial_content">
            <div class="editorial_judul">
                <h1>Tim Editorial</h1>
            </div>
            <div class="ketua_redaksi">
                <h3>Ketua Redaksi</h3>
                <h6>Udin</h6>
                <h6>Politeknik Caltex Riau, Indonesia</h6>
                <h6>GoogleScholarID: cOX5SPsAAAAJ, ScopusID: 57330218200, SintaID: 6687913</h6>
            </div>
            <br>
            <div class="editor">
                <h3>Editor</h3>
                @foreach ($editor as $e)
                <h6>{{ $e->nama }}</h6>
                <h6>{{ $e->afiliasi }}</h6>
                <h6>GoogleScholarID: {{ $e->gsch_id }}, ScopusID: {{ $e->scopus_id }}, SintaID: {{ $e->sinta_id }}</h6>
                <br>
                @endforeach
            </div>
            <div class="reviewer">
                <h3>Reviewer</h3>
                @foreach ($reviewer as $e)
                <h6>{{ $e->nama }}</h6>
                <h6>{{ $e->afiliasi }}</h6>
                <h6>GoogleScholarID: {{ $e->gsch_id }}, ScopusID: {{ $e->scopus_id }}, SintaID: {{ $e->sinta_id }}</h6>
                <br>
                @endforeach
            </div>
        </div>
        <br>
    </div>
@endsection
@extends('layout.user.user_layout')

@section('content')
    <div class="container-fluid p-0">
        <div class="justify-content-center">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profil User</h5>
                    </div>
                    <div class="card-body">
                        @if ($profile != null)
                        <div class="mb-3">
                            <h2>Nama</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $profile->nama }}</label>
                        </div>
                        <div class="mb-3">
                            <h2>No Telp</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $profile->no_telp }}</label>
                        </div>
                        <div class="mb-3">
                            <h2>Afiliasi</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $profile->afiliasi }}</label>
                        </div>
                        <div class="mb-3">
                            <h2>Bahasa Kerja</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $profile->bahasa_kerja }}</label>
                        </div> 
                        <div class="mb-3">
                            <h2>Google Scholar ID</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $profile->gsch_id }}</label>
                        </div> 
                        <div class="mb-3">
                            <h2>Scopus ID</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $profile->scopus_id }}</label>
                        </div> 
                        <div class="mb-3">
                            <h2>Sinta ID</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $profile->sinta_id }}</label>
                        </div>
                        <button type="submit" class="btn btn-primary"><a class="text-white" href="/edit_profile">Edit Profile</a></button>
                        @else
                        <h2>Data profile belum diisi</h2>
                        <button type="submit" class="btn btn-primary"><a class="text-white" href="/isi_profile">Isi Profile</a></button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

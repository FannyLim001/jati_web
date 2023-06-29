@extends('layout.admin.admin_layout')

@section('content')
    <div class="container-fluid p-0">
        <div class="justify-content-center">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Akun Editor</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h2>Username</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $user->username }}</label>
                        </div>
                        <div class="mb-3">
                            <h2>Email</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $user->email }}</label>
                        </div>
                        <button type="submit" class="btn btn-primary"><a class="text-white" href="/admin_editeditor/{{ $user->id }}">Edit Akun</a></button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profil Editor</h5>
                    </div>
                    <div class="card-body">
                        @if ($user_profile != null)
                        <div class="mb-3">
                            <h2>Nama</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $user_profile->nama }}</label>
                        </div>
                        <div class="mb-3">
                            <h2>No Telp</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $user_profile->no_telp }}</label>
                        </div>
                        <div class="mb-3">
                            <h2>Afiliasi</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $user_profile->afiliasi }}</label>
                        </div>
                        <div class="mb-3">
                            <h2>Bahasa Kerja</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $user_profile->bahasa_kerja }}</label>
                        </div> 
                        <div class="mb-3">
                            <h2>Google Scholar ID</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $user_profile->gsch_id }}</label>
                        </div> 
                        <div class="mb-3">
                            <h2>Scopus ID</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $user_profile->scopus_id }}</label>
                        </div> 
                        <div class="mb-3">
                            <h2>Sinta ID</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $user_profile->sinta_id }}</label>
                        </div> 
                        <button type="submit" class="btn btn-primary"><a class="text-white" href="/admin_edit_profile_editor/{{ $user_profile->id }}">Edit Profile</a></button>
                        @else
                        <h2>Data profile belum diisi</h2>
                        <button type="submit" class="btn btn-primary"><a class="text-white" href="/admin_isi_profile_editor/{{ $user->id }}">Isi Profile</a></button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

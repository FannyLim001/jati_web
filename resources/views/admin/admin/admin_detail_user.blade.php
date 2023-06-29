@extends('layout.admin.admin_layout')

@section('content')
    <div class="container-fluid p-0">
        <div class="justify-content-center">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Akun Admin</h5>
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
                        <button type="submit" class="btn btn-primary"><a class="text-white" href="/admin_editadmin/{{ $user->id }}">Edit Akun</a></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

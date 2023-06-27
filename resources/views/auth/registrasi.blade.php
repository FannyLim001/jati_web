@extends('layout.auth.auth_layout')

@section('content')
<div class="card-body">
    <h3 class="card-title text-center">Buat Akun</h3>
    <h5 class="card-text text-center">Buat akun sekarang juga untuk akses lebih!</h5>
    <form action="" class="text-left">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input type="text" class="form-control" id="exampleFormControlInput1"
                placeholder="nama">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1"
                placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleFormControlInput1"
                placeholder="Password">
        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn_blue">Daftar</button>
          </div>
    </form>
    <div class="text-center mt-3">
        <p>Sudah punya akun?&nbsp;<a href="/login" class="card-link">Login</a></p>
    </div>
</div>
@endsection
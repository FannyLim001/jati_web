@extends('layout.auth.auth_layout')

@section('content')
<div class="card-body">
    <h3 class="card-title text-center">Selamat datang kembali!</h3>
    <h5 class="card-text text-center">Login dengan akun yang sudah terdaftar</h5>
    <form action="{{ route('login.post') }}" method="post" class="text-left">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="exampleFormControlInput1"
                placeholder="nama">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1"
                placeholder="Password">
        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn_blue">Login</button>
          </div>
    </form>
    <div class="text-center mt-3">
        <p>Belum punya akun?&nbsp;<a href="/registrasi" class="card-link">Registrasi</a></p>
    </div>
</div>
@endsection
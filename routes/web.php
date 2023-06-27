<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.dashboard');
});

Route::get('/arsip', function () {
    return view('user.arsip');
});

Route::get('/arsip_volume', function () {
    return view('user.arsip_volume');
});

Route::get('/arsip_detail', function () {
    return view('user.arsip_detail');
});

Route::get('/terkini', function () {
    return view('user.terkini');
});

Route::get('/tentang_kami', function () {
    return view('user.tentang_kami');
});

Route::get('/tim_editorial', function () {
    return view('user.tim_editorial');
});

Route::get('/fokus_jangkauan', function () {
    return view('user.fokus_jangkauan');
});

Route::get('/index', function () {
    return view('user.index');
});

Route::get('/pedoman_author', function () {
    return view('user.pedoman_author');
});

Route::get('/proses_tinjauan', function () {
    return view('user.proses_tinjauan');
});

Route::get('/etika_publikasi', function () {
    return view('user.etika_publikasi');
});

Route::get('/lisensi', function () {
    return view('user.lisensi');
});

Route::get('/kontak', function () {
    return view('user.kontak');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/registrasi', function () {
    return view('auth.registrasi');
});
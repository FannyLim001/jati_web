<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManajemenController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [DashboardController::class, 'guestIndex'])->name('guestdashboard');

Route::get('/arsip', [JurnalController::class, 'arsipVolJurnal'])->name('arsipvol');

Route::get('/arsip_volume/{id}', [JurnalController::class, 'arsipListJurnal'])->name('arsiplist');

Route::get('/arsip_detail/{id}', [JurnalController::class, 'arsipDetailJurnal'])->name('arsipdetail');

Route::get('/terkini', [JurnalController::class, 'arsipListTerkini'])->name('arsipterkini');

Route::get('/tentang_kami', function () {
    return view('guest.tentang_kami');
});

Route::get('/tim_editorial', [JurnalController::class, 'timEditorial'])->name('timeditorial');

Route::get('/fokus_jangkauan', function () {
    return view('guest.fokus_jangkauan');
});

Route::get('/index', function () {
    return view('guest.index');
});

Route::get('/pedoman_author', function () {
    return view('guest.pedoman_author');
});

Route::get('/proses_tinjauan', function () {
    return view('guest.proses_tinjauan');
});

Route::get('/etika_publikasi', function () {
    return view('guest.etika_publikasi');
});

Route::get('/lisensi', function () {
    return view('guest.lisensi');
});

Route::get('/kontak', function () {
    return view('guest.kontak');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'prosesLogin'])->name('login.post');

Route::get('/registrasi', [AuthController::class, 'signup'])->name('signup');

Route::post('/registrasi', [AuthController::class, 'registrasi'])->name('signup.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// User dashboard routes
Route::middleware(['auth', 'user'])->group(function () {
    // Route::get('/user_dashboard', function () {
    //     return view('user.dashboard');
    // });

    Route::get('/user_jurnal', [JurnalController::class, 'index'])->name('jurnal');

    Route::get('/tambah_jurnal', [JurnalController::class, 'tambahJurnal'])->name('tambahjurnal');

    Route::post('/tambah_jurnal', [JurnalController::class, 'storeJurnal'])->name('tambahjurnal.post');

    Route::get('/detail_jurnal/{id}', [JurnalController::class, 'detailJurnal'])->name('detailjurnal');

    Route::get('/editor_jurnal', [JurnalController::class, 'editorIndex'])->name('editorjurnal');

    Route::get('/editor_detailjurnal/{id}', [JurnalController::class, 'editorDetailJurnal'])->name('editordetailjurnal');

    Route::post('/editor_detailjurnal', [JurnalController::class, 'editorEditJurnal'])->name('editordetailjurnal.post');

    Route::get('/reviewer_jurnal', [JurnalController::class, 'reviewerIndex'])->name('reviewerjurnal');

    Route::get('/reviewer_detailjurnal/{id}', [JurnalController::class, 'reviewerDetailJurnal'])->name('reviewerdetailjurnal');

    Route::post('/reviewer_detailjurnal', [JurnalController::class, 'reviewJurnal'])->name('reviewerdetailjurnal.post');

    Route::get('/user_profile', [ProfileController::class, 'index'])->name('profile');

    Route::get('/isi_profile', [ProfileController::class, 'isiProfile'])->name('isiprofile');

    Route::post('/isi_profile', [ProfileController::class, 'storeProfile'])->name('isiprofile.post');

    Route::get('/edit_profile', [ProfileController::class, 'ubahProfile'])->name('ubahprofile');

    Route::post('/edit_profile', [ProfileController::class, 'editProfile'])->name('ubahprofile.post');
});

// Admin dashboard routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin_dashboard', [DashboardController::class, 'adminIndex'])->name('admindashboard');

    Route::get('/admin_vol_jurnal', [JurnalController::class, 'volumeJurnal'])->name('admin_voljurnal');

    Route::get('/admin_tambah_vol_jurnal', [JurnalController::class, 'tambahVolJurnal'])->name('admin_tambahvoljurnal');

    Route::post('/admin_tambah_vol_jurnal', [JurnalController::class, 'storeVolJurnal'])->name('admin_tambahvoljurnal.post');

    Route::get('/admin_detail_vol_jurnal/{id}', [JurnalController::class, 'detailVolJurnal'])->name('admin_detailvoljurnal');

    Route::get('/admin_jurnal', [JurnalController::class, 'adminIndex'])->name('admin_jurnal');

    Route::get('/admin_detail_jurnal/{id}', [JurnalController::class, 'adminDetailJurnal'])->name('admin_detailjurnal');

    Route::post('/admin_detail_jurnal', [JurnalController::class, 'adminAturStatus'])->name('admin_detailjurnal.post');

    Route::get('/admin_manajemen_user', [UserManajemenController::class, 'userIndex'])->name('admin_manajemen_user');

    Route::get('/admin_tambahuser', [UserManajemenController::class, 'tambahUser'])->name('admintambahuser');

    Route::post('/admin_tambahuser', [UserManajemenController::class, 'addUser'])->name('admintambahuser.post');

    Route::get('/admin_detailuser/{id}', [UserManajemenController::class, 'detailUser'])->name('admindetailuser');

    Route::get('/admin_edituser/{id}', [UserManajemenController::class, 'ubahUser'])->name('adminedituser');

    Route::post('/admin_edituser', [UserManajemenController::class, 'editUser'])->name('adminedituser.post');

    Route::get('/admin_isi_profile/{id}', [ProfileController::class, 'adminIsiProfile'])->name('admin_isiprofile');

    Route::post('/admin_isi_profile', [ProfileController::class, 'adminStoreProfile'])->name('admin_isiprofile.post');

    Route::get('/admin_edit_profile/{id}', [ProfileController::class, 'adminUbahProfile'])->name('admin_ubahprofile');

    Route::post('/admin_edit_profile', [ProfileController::class, 'adminEditProfile'])->name('admin_ubahprofile.post');

    Route::get('/admin_manajemen_editor', [UserManajemenController::class, 'editorIndex'])->name('admin_manajemen_editor');

    Route::get('/admin_tambaheditor', [UserManajemenController::class, 'tambahEditor'])->name('admintambaheditor');

    Route::post('/admin_tambaheditor', [UserManajemenController::class, 'addEditor'])->name('admintambaheditor.post');

    Route::get('/admin_detaileditor/{id}', [UserManajemenController::class, 'detailEditor'])->name('admindetaileditor');

    Route::get('/admin_editeditor/{id}', [UserManajemenController::class, 'ubahEditor'])->name('adminediteditor');

    Route::post('/admin_editeditor', [UserManajemenController::class, 'editEditor'])->name('adminediteditor.post');

    Route::get('/admin_isi_profile_editor/{id}', [ProfileController::class, 'adminIsiProfileEditor'])->name('admin_isiprofile');

    Route::post('/admin_isi_profile_editor', [ProfileController::class, 'adminStoreProfileEditor'])->name('admin_isiprofile.post');

    Route::get('/admin_edit_profile_editor/{id}', [ProfileController::class, 'adminUbahProfileEditor'])->name('admin_ubahprofile');

    Route::post('/admin_edit_profile_editor', [ProfileController::class, 'adminEditProfileEditor'])->name('admin_ubahprofile.post');

    Route::get('/admin_manajemen_reviewer', [UserManajemenController::class, 'reviewerIndex'])->name('admin_manajemen_reviewer');

    Route::get('/admin_tambahreviewer', [UserManajemenController::class, 'tambahReviewer'])->name('admintambahreviewer');

    Route::post('/admin_tambahreviewer', [UserManajemenController::class, 'addReviewer'])->name('admintambahreviewer.post');

    Route::get('/admin_detailreviewer/{id}', [UserManajemenController::class, 'detailReviewer'])->name('admindetailreviewer');

    Route::get('/admin_editreviewer/{id}', [UserManajemenController::class, 'ubahReviewer'])->name('admineditreviewer');

    Route::post('/admin_editreviewer', [UserManajemenController::class, 'editReviewer'])->name('admineditreviewer.post');

    Route::get('/admin_isi_profile_reviewer/{id}', [ProfileController::class, 'adminIsiProfileReviewer'])->name('admin_isiprofile');

    Route::post('/admin_isi_profile_reviewer', [ProfileController::class, 'adminStoreProfileReviewer'])->name('admin_isiprofile.post');

    Route::get('/admin_edit_profile_reviewer/{id}', [ProfileController::class, 'adminUbahProfileReviewer'])->name('admin_ubahprofile');

    Route::post('/admin_edit_profile_reviewer', [ProfileController::class, 'adminEditProfileReviewer'])->name('admin_ubahprofile.post');

    Route::get('/admin_manajemen_admin', [UserManajemenController::class, 'adminIndex'])->name('admin_manajemen_admin');

    Route::get('/admin_tambahadmin', [UserManajemenController::class, 'tambahAdmin'])->name('admintambahadmin');

    Route::post('/admin_tambahadmin', [UserManajemenController::class, 'addAdmin'])->name('admintambahadmin.post');

    Route::get('/admin_detailadmin/{id}', [UserManajemenController::class, 'detailAdmin'])->name('admindetailadmin');

    Route::get('/admin_editadmin/{id}', [UserManajemenController::class, 'ubahAdmin'])->name('admineditadmin');

    Route::post('/admin_editadmin', [UserManajemenController::class, 'editAdmin'])->name('admineditadmin.post');
});

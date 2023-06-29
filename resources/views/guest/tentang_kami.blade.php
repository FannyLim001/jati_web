@extends('layout.guest.guest_layout')

@section('content')
    <div class="col-lg-8">
        <div class="tentang_content">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <img src="{{ asset('img') }}/cover_jurnal.png" class="cover-jurnal img-fluid" alt="banner">
                </div>
                <div class="col-lg-8 col-md-6 col-sm-6">
                    <div class="tentang_judul">
                        <h1>Tentang JATI</h1>
                    </div>
                    <div class="tentang_text">
                        <p>Jurnal A Teknik Informatika (JATI) adalah jurnal nasional yang diterbitkan oleh
                            Program Studi
                            Teknik Informatika (PSTI), Politeknik Caltex Riau (PCR), Pekanbaru sejak tahun 2023
                        </p>
                    </div>
                    <div class="tentang_judul">
                        <h1>Siapa di balik JATI?</h1>
                    </div>
                    <div class="tentang_text">
                        <p>JJATI dikembangkan oleh prodi Teknik Informatika Politeknik Caltex Riau pada tahun
                            2023 untuk dosen prodi Teknik Informatika agar dapat mempublish jurnal penelitian mereka ke
                            publik
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br>
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
                <h6>Udin</h6>
                <h6>Politeknik Caltex Riau, Indonesia</h6>
                <h6>GoogleScholarID: cOX5SPsAAAAJ, ScopusID: 57330218200, SintaID: 6687913</h6>
                <br>
                <h6>Udin</h6>
                <h6>Politeknik Caltex Riau, Indonesia</h6>
                <h6>GoogleScholarID: cOX5SPsAAAAJ, ScopusID: 57330218200, SintaID: 6687913</h6>
            </div>
            <br>
            <div class="reviewer">
                <h3>Reviewer</h3>
                <h6>Udin</h6>
                <h6>Politeknik Caltex Riau, Indonesia</h6>
                <h6>GoogleScholarID: cOX5SPsAAAAJ, ScopusID: 57330218200, SintaID: 6687913</h6>
                <br>
                <h6>Udin</h6>
                <h6>Politeknik Caltex Riau, Indonesia</h6>
                <h6>GoogleScholarID: cOX5SPsAAAAJ, ScopusID: 57330218200, SintaID: 6687913</h6>
            </div>
            <br>
            <div class="editorial_button">
                <button class="btn_blue"><a href="/tim_editorial">Selengkapnya</a></button>
            </div>
        </div>
        <br>
        <div class="kontak_content">
            <div class="kontak_judul">
                <h1>Kontak</h1>
            </div>
            <div class="kontak_info">
                <div class="card" style="width: 25rem;">
                    <div class="card-body">
                        <p class="card-text">
                            Politeknik Caltex Riau
                            Jl. Umban Sari (Patin) No. 1 Rumbai
                            Pekanbaru-Riau 28265
                        </p>
                        <div class="row">
                            <div class="col-2">
                                <i class="fa-solid fa-phone fa-xl" style="color: #469be9;"></i>
                            </div>
                            <div class="col-10">
                                <p class="card-text">(0761) – 53939</p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                <i class="fa-solid fa-envelope fa-xl" style="color: #469be9;"></i>
                            </div>
                            <div class="col-10">
                                <p class="card-text">psti@pcr.ac.id</p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.480837069637!2d101.4260969!3d0.5709752!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab67086f2e89%3A0x65a24264fec306bb!2sPoliteknik%20Caltex%20Riau!5e0!3m2!1sen!2sid!4v1687836962872!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <br>
    </div>
@endsection

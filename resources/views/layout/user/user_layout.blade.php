<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JATI - Jurnal Aplikasi Teknologi Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/d42ce06cb7.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
</head>
</head>

<body>
    <div class="user_nav">
        <img src="{{ asset('img') }}/beranda_banner.png" class="bg-img img-fluid" alt="banner">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="logo_hello">
                    <a href="/">
                        <div class="logo_container"></div>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav mx-auto p-2">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/arsip">Arsip</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/terkini">Terkini</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tentang_kami">Tentang Kami</a>
                        </li>
                    </ul>
                    <button class="btn_login" type="submit"><a href="/login">Login</a></button>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-lg-4 col-md-2 col-sm-2">
                <img src="{{ asset('img') }}/beranda_illust.png" class="cover-img img-fluid" alt="banner">
            </div>
            <div class="col-lg-8 col-md-10 col-sm-10">
                <div class="welcome">
                    <h1>Selamat datang di JATI</h1>
                </div>
                <div class="welcome_text">
                    <p>JATI (Jurnal Aplikasi Teknologi Informasi) adalah merupakan jurnal nasional yang diterbitkan oleh
                        Prodi Teknik Informatika (TI), Politeknik Caltex Riau (PCR), Pekanbaru sejak tahun 2023.</p>
                    <p>e-ISSN: 1234-XXXX</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="sticky-button">
            <button id="toggleTim" class="toggle-button">
                <i class="fa-solid fa-users"></i>
                <a class="toggle-text" href="/tim_editorial"><span>Tim Editorial</span></a>
            </button>
            <br>
            <button id="toggleFokus" class="toggle-button">
                <i class="fa-solid fa-list-check"></i>
                <a class="toggle-text" href="/fokus_jangkauan"><span>Fokus dan Jangkauan</span></a>
            </button>
            <br>
            <button id="toggleIndex" class="toggle-button">
                <i class="fa-solid fa-bookmark"></i>
                <a class="toggle-text" href="/index"><span>Index</span></a>
            </button>
            <br>
            <button id="togglePedoman" class="toggle-button">
                <i class="fa-solid fa-circle-check"></i>
                <a class="toggle-text" href="/pedoman_author"><span>Pedoman Author</span></a>
            </button>
            <br>
            <button id="toggleProses" class="toggle-button">
                <i class="fa-solid fa-file-pen"></i>
                <a class="toggle-text" href="/proses_tinjauan"><span>Proses Tinjauan</span></a>
            </button>
            <br>
            <button id="toggleEtika" class="toggle-button">
                <i class="fa-solid fa-clipboard-check"></i>
                <a class="toggle-text" href="/etika_publikasi"><span>Etika Publikasi</span></a>
            </button>
            <br>
            <button id="toggleSubmit" class="toggle-button">
                <i class="fa-solid fa-file-circle-plus"></i>
                <a class="toggle-text" href="/login"><span>Submit Jurnal</span></a>
            </button>
            <br>
            <button id="toggleLisensi" class="toggle-button">
                <i class="fa-solid fa-scroll"></i>
                <a class="toggle-text" href="/lisensi"><span>Lisensi</span></a>
            </button>
            <br>
            <button id="toggleKontak" class="toggle-button">
                <i class="fa-solid fa-address-book"></i>
                <a class="toggle-text" href="/kontak"><span>Kontak</span></a>
            </button>
        </div>
        <div class="row">
            @yield('content')
            <div class="col-lg-4">
                <div class="sidemenu">
                    <div class="card">
                        <div class="card-header">
                            Terindeks dari
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('img') }}/sinta_logo.png" class="img-fluid"
                                alt="sinta">&nbsp;&nbsp;&nbsp;
                            <img src="{{ asset('img') }}/google_scholar_logo.png" class="img-fluid"
                                alt="google">&nbsp;&nbsp;&nbsp;
                            <img src="{{ asset('img') }}/doaj_logo.png" class="img-fluid" alt="doaj">
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            Alat Rekomendasi
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('img') }}/mendeley_logo.png" class="img-fluid"
                                alt="mendeley">&nbsp;&nbsp;&nbsp;
                            <img src="{{ asset('img') }}/turnit_logo.png" class="img-fluid"
                                alt="turnit">&nbsp;&nbsp;&nbsp;
                            <img src="{{ asset('img') }}/grammarly_logo.png" class="img-fluid" alt="grammarly">
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            Di Dukung oleh
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('img') }}/pcr_logo.png" class="img-fluid"
                                alt="pcr">&nbsp;&nbsp;&nbsp;
                            <img src="{{ asset('img') }}/psti_logo.png" class="img-fluid"
                                alt="psti">&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="text-center text-lg-start text-muted">

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Content -->
                        <img src="{{ asset('img') }}/jati_logo.png" class="img-fluid" alt="">
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-5">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Layanan
                        </h6>
                        <p>
                            <a href="/arsip">Arsip</a>
                        </p>
                        <p>
                            <a href="#!">Editor</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-7 col-lg-7 col-xl-7 mx-auto mt-5">
                        <!-- Content -->
                        <p>
                            JATI: Jurnal Penelitian Dosen |e-ISSN: 1234-XXXX| di publikasikan oleh
                            Program Studi Politeknik Caltex Riau | email: jati@pcr.ac.id. |
                        </p>
                        <img src="{{ asset('img') }}/cc_logo.png" alt="">
                        <br>
                        <br>
                        <p>Creative Common Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color:#94d1ff;">
            © 2023 Copyright:
            <a class="text-reset fw-bold" href="https://pcr.ac.id/">Politeknik Caltex Riau</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <script>
        $(document).ready(function() {
            $('#toggleTim').click(function() {
                $('.toggle-text').toggle(); // Toggle the visibility of the text
            });
            $('#toggleFokus').click(function() {
                $('.toggle-text').toggle(); // Toggle the visibility of the text
            });
            $('#toggleIndex').click(function() {
                $('.toggle-text').toggle(); // Toggle the visibility of the text
            });
            $('#togglePedoman').click(function() {
                $('.toggle-text').toggle(); // Toggle the visibility of the text
            });
            $('#toggleProses').click(function() {
                $('.toggle-text').toggle(); // Toggle the visibility of the text
            });
            $('#toggleEtika').click(function() {
                $('.toggle-text').toggle(); // Toggle the visibility of the text
            });
            $('#toggleSubmit').click(function() {
                $('.toggle-text').toggle(); // Toggle the visibility of the text
            });
            $('#toggleLisensi').click(function() {
                $('.toggle-text').toggle(); // Toggle the visibility of the text
            });
            $('#toggleKontak').click(function() {
                $('.toggle-text').toggle(); // Toggle the visibility of the text
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>

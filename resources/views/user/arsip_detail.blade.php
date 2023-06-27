@extends('layout.user.user_layout')

@section('content')
    <div class="col-lg-8">
        <div class="detail_content">
            <div class="row">
            <div class="col-10">
                <div class="detail_judul">
                    <h1>Pengembangan Game gacha menggunakan Unity</h1>
                </div>
            </div>
            <div class="col-2">
                <button class="pdf_button"><a href="/.pdf"><i class="fa-solid fa-file-pdf"></i>&nbsp;&nbsp;PDF</a></button>
            </div>
        </div>
        <br>
        <div class="detail_card">
            <div class="card">
                <div class="card-header">
                    <h4>Penulis</h4>
                    <p>Muhammad Ilham, Kaveh</p>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Abstrak</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet fermentum urna. Duis nec eros
                        ex. Praesent a euismod justo. Nullam dignissim, lectus sed iaculis placerat, quam odio sagittis leo,
                        tempor porta lorem lectus sed lectus. Etiam semper, neque at mattis ultricies, dolor mi congue
                        risus, non vehicula libero risus ac erat. Integer nec arcu augue. Vivamus quis hendrerit diam, sit
                        amet dictum metus. Sed euismod lorem justo, in posuere purus faucibus id. Praesent sit amet rutrum
                        massa, sed porttitor sem. Integer lacinia malesuada eros, eget venenatis mauris tincidunt at. Morbi
                        et purus odio. Nunc sit amet viverra sem. Curabitur scelerisque consectetur ultrices. Suspendisse
                        potenti.
                    </p>
                    <h4 class="card-title">Teks Lengkap</h4>
                    <a href="/pdf" class="pdf_link">PDF</a>
                    <br><br>
                    <div class="detail_ref">
                        <h4 class="card-title">Referensi</h4>
                    <p>
                        S. v. Militante, “Malaria Disease Recognition through Adaptive Deep Learning Models of Convolutional
                        Neural Network,” ICETAS 2019 - 2019
                        6th IEEE International Conference on Engineering, Technologies and Applied Sciences, Dec. 2019, doi:
                        10.1109/ICETAS48360.2019.9117446.
                    </p>
                    <p>
                        S. v. Militante, “Malaria Disease Recognition through Adaptive Deep Learning Models of Convolutional
                        Neural Network,” ICETAS 2019 - 2019
                        6th IEEE International Conference on Engineering, Technologies and Applied Sciences, Dec. 2019, doi:
                        10.1109/ICETAS48360.2019.9117446.
                    </p>
                    </div>
                    <a href="http://dx.doi.org/10.25126/jati.90112345">DOI: http://dx.doi.org/10.25126/jati.90112345</a>
                </div>
            </div>
            <br>
        </div>
        </div>
    </div>
@endsection

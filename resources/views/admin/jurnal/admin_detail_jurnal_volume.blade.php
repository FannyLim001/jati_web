@extends('layout.admin.admin_layout')

@section('content')
    <div class="container-fluid p-0">
        <div class="justify-content-center">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detail Vol Jurnal</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h2>Nama Volume</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $jurnal_vol->nama_volume }}</label>
                        </div>
                        <div class="mb-3">
                            <h2>Deskripsi Volume</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $jurnal_vol->desc_volume }}</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

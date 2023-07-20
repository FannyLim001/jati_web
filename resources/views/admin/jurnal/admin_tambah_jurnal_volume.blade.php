@extends('layout.admin.admin_layout')

@section('content')
    <div class="container-fluid p-0">
        <div class="justify-content-center">
            <form action="{{ route('admin_tambahvoljurnal.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Tambah Volume Jurnal</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Volume</label>
                            <input type="text" name="nama_vol" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <p>Format: Vol (No Volume), No (No Bagian Volume) (Tahun Volume Dibuat)</p>
                            @error('nama_vol')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Volume</label>
                            <textarea class="form-control" name="desc_vol" id="exampleFormControlTextarea1" rows="5"></textarea>
                            @error('desc_vol')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layout.user.user_layout')

@section('content')
    <div class="container-fluid p-0">
        <div class="justify-content-center">
            <form action="{{ route('isiprofile.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Isi Profile</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">No Telp</label>
                            <input type="text" name="no_telp" class="form-control" id="exampleInputPassword1">
                            @error('no_telp')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Afiliasi</label>
                            <input type="text" name="afiliasi" class="form-control" id="exampleInputPassword1">
                            @error('afiliasi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Bahasa Kerja</label>
                            <select class="form-select mb-3" name="bahasa_kerja">
                                   <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                   <option value="Bahasa Inggris">Bahasa Inggris</option>
                              </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Google Scholar ID</label>
                            <input type="text" name="gsch_id" class="form-control" id="exampleInputPassword1">
                            @error('gsch_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Scopus ID</label>
                            <input type="text" name="scopus_id" class="form-control" id="exampleInputPassword1">
                            @error('scopus_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Sinta ID</label>
                            <input type="text" name="sinta_id" class="form-control" id="exampleInputPassword1">
                            @error('sinta_id')
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

@extends('layout.admin.admin_layout')

@section('content')
<div class="container-fluid p-0">

    @if (session()->has('success'))
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Sukses!</strong> {{ session('success') }}
      </div>
        @endif
    <h1 class="h3 mb-3">Volume Jurnal</h1>

    <div class="row">
        <div class="col-12">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title mb-0">Daftar volume jurnal</h5>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-info">
                                <a class="text-white" href="/admin_tambah_vol_jurnal">Tambah Volume Jurnal</a>
                            </button>    
                        </div>
                    </div>
                </div>
                <div class="p-0 table-responsive">
                <table id="tableJurnal" class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Waktu Pembuatan</th>
                            <th>Nama Volume</th>
                            <th>Deskripsi Volume</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($jurnal_vol as $j)
                        <tr>
                            <td>{{ $j->tanggal_volume }}</td>
                            <td>{{ $j->nama_volume }}</td>
                            <td>{{ $j->desc_volume }}</td>
                            <td>
                                <button class="btn btn-info">
                                    <a class="text-white" href="/admin_detail_vol_jurnal/{{ $j->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info align-middle me-2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                        Detail</a>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
     $(document).ready(function() {
            $('#tableJurnal').DataTable();
     });
</script>
@endsection
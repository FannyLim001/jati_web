@extends('layout.user.user_layout')

@section('content')
<div class="container-fluid p-0">

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
        @endif
    <h1 class="h3 mb-3">Jurnal</h1>

    <div class="row">
        <div class="col-12">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title mb-0">Daftar jurnal saya</h5>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-info">
                                <a class="text-white" href="/tambah_jurnal">Submit Jurnal</a>
                            </button>    
                        </div>
                    </div>
                </div>
                <div class="p-0 table-responsive">
                <table id="tableJurnal" class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Waktu Pengajuan</th>
                            <th>Judul</th>
                            <th>Kata Kunci</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($jurnal as $j)
                        <tr>
                            <td>{{ $j->tanggal_submit }}</td>
                            <td>{{ $j->judul }}</td>
                            <td>{{ $j->kata_kunci }}</td>
                            @if ($j->status == 'Submission')
                                <td><span class="badge bg-secondary">{{ $j->status }}</span></td>
                            @elseif($j->status == 'Direview')
                            <td><span class="badge bg-warning">{{ $j->status }}</span></td>
                            @elseif($j->status == 'Diterima')
                            <td><span class="badge bg-info">{{ $j->status }}</span></td>
                            @elseif($j->status == 'Copy Editing')
                            <td><span class="badge bg-info">{{ $j->status }}</span></td>
                            @elseif($j->status == 'Dipublish')
                            <td><span class="badge bg-success">{{ $j->status }}</span></td>
                            @elseif($j->status == 'Ditolak')
                            <td><span class="badge bg-danger">{{ $j->status }}</span></td>
                            @elseif($j->status == 'Submisi diterima')
                            <td><span class="badge bg-success">{{ $j->status }}</span></td>
                            @elseif($j->status == 'Diperlukan revisi')
                            <td><span class="badge bg-warning">{{ $j->status }}</span></td>
                            @elseif($j->status == 'Submit ulang untuk review')
                            <td><span class="badge bg-info">{{ $j->status }}</span></td>
                            @elseif($j->status == 'Submit ulang ditempat lain')
                            <td><span class="badge bg-info">{{ $j->status }}</span></td>
                            @elseif($j->status == 'Submisi ditolak')
                            <td><span class="badge bg-danger">{{ $j->status }}</span></td>
                            @endif
                            <td>
                                <button class="btn btn-info">
                                    <a class="text-white" href="/detail_jurnal/{{ $j->id }}">
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
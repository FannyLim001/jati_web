@extends('layout.user.user_layout')

@section('content')
    <div class="container-fluid p-0">
        <div class="justify-content-center">
            <form action="{{ route('reviewerdetailjurnal.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $jurnal->id }}">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detail Jurnal</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h2>Judul</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $jurnal->judul }}</label>
                        </div>
                        <div class="mb-3">
                            <h2>Kata Kunci</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $jurnal->kata_kunci }}</label>
                        </div>
                        <div class="mb-3">
                            <h2>Abstrak</h2>
                            <label for="exampleInputEmail1" class="form-label">{{ $jurnal->abstrak }}</label>
                        </div>
                        <div class="mb-3">
                            <h2>Jurnal (PDF)</h2>
                            <embed src="{{ asset('storage/pdf/' . $jurnal->file_pdf) }}" type="application/pdf" width="100%" height="600px">                            
                        </div>
                        <div class="mb-3">
                            <!-- Contributor Section -->
                            <div class="form-group">
                                <h2>Kontributor</h2>
                                @foreach ($kontributor as $k)
                                    <label for="exampleInputEmail1" class="form-label">{{ $k->nama }}</label><br>
                                @endforeach
                            </div>
                            <div id="contributors-container"></div>
                        </div>
                        <div class="mb-3">
                            <!-- References Section -->
                            <div class="form-group">
                                <h2>Referensi</h2>
                                @foreach ($reference as $r)
                                <label for="exampleInputEmail1" class="form-label">{{ $r->referensi }}</label><br>
                                @endforeach
                            </div>
                            <div id="references-container"></div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Status</label>
                                <div class="col-md-15">
                                    @if ($jurnal->status == 'Pending')
                                        <td><span class="badge bg-secondary">{{ $jurnal->status }}</span></td>
                                    @elseif($jurnal->status == 'Disetujui')
                                        <td><span class="badge bg-success">{{ $jurnal->status }}</span></td>
                                    @elseif($jurnal->status == 'Ditolak')
                                        <td><span class="badge bg-danger">{{ $jurnal->status }}</span></td>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <!-- References Section -->
                            <div class="form-group">
                                <h2>Review</h2>
                                @if ($jurnal_review->isEmpty())
                                <label for="exampleInputEmail1" class="form-label">Belum ada review</label>
                                @else
                                @foreach ($jurnal_review as $r)
                                <label for="exampleInputEmail1" class="form-label">{{ $r->review_text }}</label><br>
                                @endforeach
                                @endif
                            </div>
                            <div id="references-container"></div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="review">Review Saya</label>
                                <textarea class="form-control" id="references" name="review_text" rows="3"></textarea>
                                @error('review')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

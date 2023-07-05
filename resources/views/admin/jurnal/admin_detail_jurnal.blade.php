@extends('layout.admin.admin_layout')

@section('content')
    <div class="container-fluid p-0">
        <div class="justify-content-center">
            <form action="{{ route('admin_detailjurnal.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $jurnal->id }}">
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
                            <h2>Jurnal (PDF, DOC, DOCX)</h2>
                            <embed src="{{ asset('storage/pdf/' . $jurnal->file_pdf) }}" type="application/pdf"
                                width="100%" height="600px">
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
                                    @if ($jurnal->status == 'Submission')
                                        <td><span class="badge bg-secondary">{{ $jurnal->status }}</span></td>
                                    @elseif($jurnal->status == 'Direview')
                                        <td><span class="badge bg-warning">{{ $jurnal->status }}</span></td>
                                    @elseif($jurnal->status == 'Diterima')
                                        <td><span class="badge bg-info">{{ $jurnal->status }}</span></td>
                                    @elseif($jurnal->status == 'Copy Editing')
                                        <td><span class="badge bg-info">{{ $jurnal->status }}</span></td>
                                    @elseif($jurnal->status == 'Dipublish')
                                        <td><span class="badge bg-success">{{ $jurnal->status }}</span></td>
                                    @elseif($jurnal->status == 'Ditolak')
                                        <td><span class="badge bg-danger">{{ $jurnal->status }}</span></td>
                                    @elseif($jurnal->status == 'Diperlukan revisi')
                                        <td><span class="badge bg-warning">{{ $jurnal->status }}</span></td>
                                    @elseif($jurnal->status == 'Submit ulang untuk review')
                                        <td><span class="badge bg-info">{{ $jurnal->status }}</span></td>
                                    @elseif($jurnal->status == 'Submit ulang ditempat lain')
                                        <td><span class="badge bg-info">{{ $jurnal->status }}</span></td>
                                    @elseif($jurnal->status == 'Submisi ditolak')
                                        <td><span class="badge bg-danger">{{ $jurnal->status }}</span></td>
                                    @else
                                        <td><span class="badge bg-warning">Direview</span></td>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h2>Reviewer</h2>
                            @if ($jurnal->reviewer === null)
                                <label for="exampleInputEmail1" class="form-label">-</label>
                            @else
                                <label for="exampleInputEmail1" class="form-label">{{ $jurnal->reviewer }}</label>
                            @endif
                        </div>
                        <div class="mb-3">
                            <!-- References Section -->
                            <div class="form-group">
                                <h2>Review</h2>
                                @if ($jurnal_review->isEmpty())
                                    <label for="exampleInputEmail1" class="form-label">Belum ada review</label>
                                @else
                                    @foreach ($jurnal_review as $r)
                                        <label for="exampleInputEmail1"
                                            class="form-label">{{ $r->review_text }}</label><br>
                                    @endforeach
                                @endif
                            </div>
                            <div id="references-container"></div>
                        </div>
                        <div class="mb-3">
                            @if ($jurnal->status === 'Submisi diterima')
                                <div class="mb-3">
                                    <h2>Rekomendasi Reviewer</h2>
                                    @if ($jurnal->status == 'Submisi diterima')
                                        <td><span class="badge bg-success">{{ $jurnal->status }}</span></td>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Status Jurnal</label>
                                    <div class="col-md-15">
                                        <select class="form-control custom-select" name="status_jurnal" id="bank_tujuan">
                                            <option value="7">Pilih status</option>
                                            <option value="3">Diterima</option>
                                            <option value="6">Ditolak</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-15">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <button class="btn btn-primary btn-icon d-flex align-items-center me-auto"
                                                    type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($jurnal->status === 'Submission')
                                @if ($jurnal->reviewer_id === null)
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Atur Reviewer</label>
                                        <div class="col-md-15">
                                            <select class="form-control custom-select" name="reviewer" id="bank_tujuan">
                                                @foreach ($reviewer as $r)
                                                    <option value="{{ $r->id }}">{{ $r->username }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <div class="col-md-15">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <button
                                                        class="btn btn-primary btn-icon d-flex align-items-center me-auto"
                                                        type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @elseif ($jurnal->status === 'Diterima')
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Status Jurnal</label>
                                    <div class="col-md-15">
                                        <select class="form-control custom-select" name="status_jurnal" id="bank_tujuan">
                                            <option value="3">Pilih status</option>
                                            <option value="4">Copy Editing</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-15">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <button class="btn btn-primary btn-icon d-flex align-items-center me-auto"
                                                    type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @elseif ($jurnal->status === 'Copy Editing')
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Status Jurnal</label>
                                    <div class="col-md-15">
                                        <select class="form-control custom-select" name="status_jurnal" id="bank_tujuan">
                                            <option value="4">Pilih status</option>
                                            <option value="5">Publish</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-15">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <button class="btn btn-primary btn-icon d-flex align-items-center me-auto"
                                                    type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

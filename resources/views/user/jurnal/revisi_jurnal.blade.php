@extends('layout.user.user_layout')

@section('content')
    <div class="container-fluid p-0">
        <div class="justify-content-center">
            <form action="{{ route('usereditjurnal.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $jurnal->id }}">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Revisi Jurnal</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Volume</label>
                            <select class="form-select mb-3" name="volume_id">
                                <option value="{{ $jurnal_vol_user->vol_id }}">{{ $jurnal_vol_user->nama_volume }}</option>
                                @foreach ($jurnal_vol as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_volume }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Judul</label>
                            <input type="text" name="judul" value="{{ $jurnal->judul }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('judul')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Kata Kunci</label>
                            <input type="text" name="kata_kunci" value="{{ $jurnal->kata_kunci }}" class="form-control"
                                id="exampleInputPassword1">
                            @error('kata_kunci')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Abstrak</label>
                            <textarea class="form-control" name="abstrak" id="exampleFormControlTextarea1" rows="5">{{ $jurnal->abstrak }}</textarea>
                            @error('abstrak')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">File Jurnal (PDF, DOC, DOCX)</label>
                            <input class="form-control" name="file_pdf" type="file" id="formFile">
                            <label for="formFile" id="fileNameLabel">File sebelumnya: {{ $jurnal->file_pdf }}</label>
                            @error('file_pdf')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <!-- Contributor Section -->
                            <div class="form-group">
                                <label for="contributors">Kontributor</label>
                                @foreach ($kontributor as $contributor)
                                    <input type="text" class="form-control" id="contributors" name="contributors[]"
                                        value="{{ $contributor->nama }}"><br>
                                @endforeach
                                <small class="text-muted">Enter contributor name and press Enter to add more.</small>
                                @error('contributors.*')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="contributors-container"></div>
                        </div>
                        <div class="mb-3">
                            <!-- References Section -->
                            <div class="form-group">
                                <label for="contributors">Referensi</label>
                                @foreach ($reference as $reference)
                                    <textarea class="form-control" id="references" name="references[]" rows="3">{{ $reference->referensi }}</textarea><br>
                                @endforeach
                                <small class="text-muted">Enter reference text and press Enter to add more.</small>
                                @error('references.*')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="references-container"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(document).on('keydown', '#contributors', function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    var contributorName = $(this).val().trim();
                    if (contributorName !== '') {
                        var contributorField =
                            '<div class="form-group"><input type="text" class="form-control" name="contributors[]" value="' +
                            contributorName + '"></div><br>';
                        $('#contributors-container').append(contributorField);
                        $(this).val('');
                    }
                }
            });

            $(document).on('keydown', '#references', function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    var referencesText = $(this).val().trim();
                    if (referencesText !== '') {
                        var referencesField =
                            '<div class="form-group"><textarea class="form-control" name="references[]" rows="3">' +
                            referencesText + '</textarea></div><br>';
                        $('#references-container').append(referencesField);
                        $(this).val('');
                    }
                }
            });
        });
    </script>
@endsection

@extends('layout.admin.admin_layout')

@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>JATI</strong> Beranda</h1>

    <div class="row">
        <div class="col-xl-6 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Total Jurnal</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="book"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $total_jurnal }}</h1>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Total Author</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $total_author }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Total Editor</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="user-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $total_editor }}</h1>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Total Reviewer</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $total_reviewer }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">

                    <h5 class="card-title mb-0">Jurnal yang disubmit</h5>
                </div>
                <div class="card-body py-3">
                    <div class="chart chart-sm">
                        <canvas id="chartjs-dashboard-line"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title mb-0">Daftar jurnal</h5>
                        </div>
                        <div class="col d-flex justify-content-end">
                            {{-- <button class="btn btn-info">
                                <a class="text-white" href="/tambah_jurnal">Submit Jurnal</a>
                            </button>     --}}
                        </div>
                    </div>
                </div>
                <div class="p-0 table-responsive">
                <table id="tableJurnal" class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>User</th>
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
                            <td>{{ $j->user }}</td>
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
                                    <a class="text-white" href="/admin_detail_jurnal/{{ $j->id }}">
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
    <script>
        $(document).ready(function() {
            $('#tableJurnal').DataTable();
     });

        const label = @json($label);
        const data = @json($chartData);

        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: label,
                    datasets: [{
                        label: "Total Jurnal yang disubmit",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: data
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });
    </script>
@endsection
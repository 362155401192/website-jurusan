@extends('backend.layouts.ajax')

@section('content')
    <div class="row">
        @foreach($prestasi_per_prodi as $prodi)
            <div class="col-md-3 col-sm-6 mb-3 d-flex">
                <div class="card text-center w-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h4>{{ $prodi->achievements_count }}</h4>
                        <p>Jumlah Prestasi</p>
                        <p>{{ $prodi->name ?? 'Tanpa Nama' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class="row">
        <!-- Total Staff -->
        <div class="col-md-3 col-sm-6 mb-3 d-flex">
            <div class="card text-center w-100 d-flex flex-column">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4>{{ $jumlah_staff_total }}</h4>
                    <p>Jumlah Total Staff</p>
                </div>
            </div>
        </div>

        <!-- Per Jenis Staff -->
        <div class="col-md-4 col-sm-6 mb-3 d-flex">
            <div class="card text-center w-100 d-flex flex-column">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="mb-2">Jumlah Staff per Jenis</h5>
                    <div class="row">
                        @foreach($jenis_staff as $jenis)
                            <div class="col-4">
                                <strong>{{ $jenis->employee_count }}</strong>
                                <p class="mb-0">{{ ucfirst($jenis->name) }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Jumlah Indikator Kinerja Utama --}}
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center w-100 d-flex flex-column">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4>{{ $jumlah_indikator }}</h4>
                    <p>Jumlah Indikator Kinerja Utama</p>
                </div>
            </div>
        </div>
    </div>


    {{-- Grafik Indikator Kinerja Utama --}}
    {{-- <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Grafik Target vs Realisasi Indikator Kinerja</h5>
        </div>
        <div class="card-body">
            <canvas id="grafik-indikator" height="150"></canvas>
        </div>
    </div> --}}

@endsection




@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('grafik-indikator').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($grafik_labels),
                datasets: [
                    {
                        label: 'Target',
                        data: @json($grafik_target),
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    },
                    {
                        label: 'Realisasi',
                        data: @json($grafik_realisasi),
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    },
                    legend: {
                        position: 'top',
                    },
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        },
                        title: {
                            display: true,
                            text: 'Nilai'
                        }
                    },
                    x: {
                        ticks: {
                            autoSkip: false,
                            maxRotation: 45,
                            minRotation: 45
                        }
                    }
                }
            }
        });
    </script>
@endpush



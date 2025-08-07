@extends('backend.layouts.ajax')

@section('content')
    <div class="row">
        @foreach ($prestasi_per_prodi as $prodi)
            <div class="col-md-4 col-sm-6 mb-3 d-flex">
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
        <div class="col-md-6 col-sm-6 mb-3 d-flex">
            <div class="card text-center w-100 d-flex flex-column">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="mb-2">Jumlah Staff per Jenis</h5>
                    <div class="row">
                        @foreach ($jenis_staff as $jenis)
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
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Grafik Target vs Realisasi Indikator Kinerja</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12-12">
                    <div class="mb-3">
                        <label for="indikatorSelect">Pilih Indikator</label>
                        <select id="indikatorSelect" style="max-width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="form-control"></select>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Card Triwulan -->
                <div class="col-md-8">
                    <div class="card" style="height: calc(400px - 1rem);">
                        <div class="card-body">
                            <div id="chartTriwulan"></div>
                        </div>
                    </div>
                </div>

                <!-- Card Target Akhir -->
                <div class="col-md-4">
                    <div class="card" style="height: calc(400px - 1rem);">
                        <div class="card-body">
                            <div id="chartAkhir"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

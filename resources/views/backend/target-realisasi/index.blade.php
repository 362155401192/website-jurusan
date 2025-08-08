@extends('backend.layouts.ajax')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboards') }}" data-toggle="ajax">Home</a>
        </li>
        <li class="breadcrumb-item active">
            {{ $title }}
        </li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <div class="col-12 text-right mb-2">
                    <button class="btn btn-primary add" data-toggle="modal"
                            data-target="#realisasiModal">Tambah Target Realisasi</button>
                </div>
                <div style="overflow-x: auto;">
                    <table class="table table-bordered zero-configuration" id="targetRealisasiTable"
                        data-url="{{ route('target-realisasi.get-data') }}" width="100%">
                        <thead style="text-align: center">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Sasaran Kinerja</th>
                                <th rowspan="2">Indikator Kinerja Kegiatan</th>
                                <th colspan="2">Triwulan 1</th>
                                <th colspan="2">Triwulan 2</th>
                                <th colspan="2">Triwulan 3</th>
                                <th rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th>Target</th>
                                <th>Realisasi</th>
                                <th>Target</th>
                                <th>Realisasi</th>
                                <th>Target</th>
                                <th>Realisasi</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('backend.target-realisasi.partials.form')
@endsection

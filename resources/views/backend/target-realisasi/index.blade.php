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
                <button class="btn btn-primary" onclick="showForm()">Tambah Target Realisasi</button>
            </div>

            {{-- <div class="mb-3">
                <button class="btn btn-outline-primary filter-prodi" data-prodi="TRPL">TRPL</button>
                <button class="btn btn-outline-primary filter-prodi" data-prodi="TRK">TRK</button>
                <button class="btn btn-outline-primary filter-prodi" data-prodi="BSD">BSD</button>
            </div> --}}

            <div style="overflow-x: auto;">
                <table class="table table-bordered" id="targetRealisasiTable" data-url="{{ route('target-realisasi.list') }}" width="100%">
                    <thead>
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

                   <tbody>
                        @php $i = 1; @endphp
                        @foreach ($indikator as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $i++ }}</td>
                                <td class="align-middle">{{ $item->sasaranKinerja->nama ?? '-' }}</td>
                                <td class="align-middle">{!! nl2br(e($item->deskripsi)) !!}</td>

                                {{-- Triwulan 1-3 Target & Realisasi --}}
                                @for ($tw = 1; $tw <= 3; $tw++)
                                    @php
                                        $data = $item->targetRealisasis->firstWhere('triwulan', strval($tw));
                                    @endphp
                                    <td class="text-center">{{ $data->target ?? '-' }}</td>
                                    <td class="text-center">{{ $data->realisasi ?? '-' }}</td>
                                @endfor

                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary" onclick="showForm({{ $item->id }})">
                                        <i class="feather icon-edit"></i>
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

@include('backend.target-realisasi.partials.form')
@endsection







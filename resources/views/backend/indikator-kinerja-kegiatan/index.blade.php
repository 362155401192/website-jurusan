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
                <button class="btn btn-primary" onclick="showForm()">Tambah Indikator Kinerja Kegiatan</button>
            </div>

            {{-- <div class="mb-3">
                <button class="btn btn-outline-primary filter-prodi" data-prodi="TRPL">TRPL</button>
                <button class="btn btn-outline-primary filter-prodi" data-prodi="TRK">TRK</button>
                <button class="btn btn-outline-primary filter-prodi" data-prodi="BSD">BSD</button>
            </div> --}}


            <div style="overflow-x: auto;">
                <table class="table table-bordered" id="indikatorTable" data-url="{{ route('indikator-kinerja-kegiatan.list') }}" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Sasaran</th>
                            <th>Kode</th>
                            <th>Deskripsi</th>
                            <th>Target Akhir</th>
                            <th>Realisasi Akhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('backend.indikator-kinerja-kegiatan.partials.form')
@endsection


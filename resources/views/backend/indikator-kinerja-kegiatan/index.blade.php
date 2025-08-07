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
                <div class="row mb-2 align-items-center">
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                        <select class="form-control" id="filterProdi">
                            <option value="all">Semua Program Studi</option>
                            <option value="TRPL">TRPL</option>
                            <option value="TRK">TRK</option>
                            <option value="BSD">BSD</option>
                        </select>
                    </div>

                    <!-- Tombol tambah -->
                    <div class="col-lg-9 col-md-6 col-sm-12 mb-3 text-right">
                        <button class="btn btn-primary" onclick="showForm()">Tambah Indikator Kinerja Kegiatan</button>
                    </div>
                </div>
                <hr>
                <div style="overflow-x: auto;">
                    <table class="table table-bordered" id="indikatorTable"
                        data-url="{{ route('indikator-kinerja-kegiatan.list') }}" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sasaran</th>
                                <th>Kode</th>
                                <th>Program Studi</th>
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

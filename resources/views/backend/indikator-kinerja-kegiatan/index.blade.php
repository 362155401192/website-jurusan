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
                    <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
                        <select class="form-control" id="filterProdi">
                            <option value="all">Semua Program Studi</option>
                            @foreach ($programStudi as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
                        <select name="tahun" class="form-control" id="filterTahun">
                            <option selected disabled hidden>Filter Tahun</option>
                            <option value="all" {{ request('tahun') == 'all' ? 'selected' : '' }}>Semua Tahun</option>
                            @for ($y = now()->year; $y >= now()->year - 5; $y--)
                                <option value="{{ $y }}">{{ $y }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Tombol tambah -->
                    <div class="col-lg-6 col-md-4 col-sm-12 mb-3 text-right">
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
                                <th>Tahun</th>
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

@extends('backend.layouts.ajax')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboards') }}" data-toggle="ajax">Home</a></li>
        <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
@endsection

@section('content')
<div class="card">
    <div class="card-content">
        <div class="card-body">
            @can('create-achievements')
            <div class="col-12 text-right mb-2">
                <button class="btn btn-primary waves-effect waves-light" id="addDataBtn" type="button">
                    <i class="feather icon-plus"></i> Tambah Prestasi
                </button>
            </div>
            @endcan

            <div class="table-responsive">
                <table class="table zero-configuration table-bordered" 
                    id="dataTable" 
                    data-url="{{ route('achievements.get-data') }}" 
                    width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Penyelenggara</th>
                            <th>Juara</th>
                            <th>Dosen Pembimbing</th>
                            <th>Program Studi</th>
                            <th>Tingkat</th>
                            <th>Jenis</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Sertifikat</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('backend.achievement.partials.form')
@endsection

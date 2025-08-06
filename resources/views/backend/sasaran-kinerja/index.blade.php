@extends('backend.layouts.ajax')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboards') }}" data-toggle="ajax">Home</a>
    </li>
    <li class="breadcrumb-item active">{{ $title }}</li>
</ol>
@endsection

@section('content')
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="col-12 text-right mb-2">
                <button class="btn btn-primary" onclick="showForm()">Tambah Sasaran Kinerja</button>
            </div>

            <div style="overflow-x: auto;">
                <table class="table table-bordered" id="sasaranTable" data-url="{{ route('sasaran-kinerja.list') }}" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('backend.sasaran-kinerja.partials.form')
@endsection



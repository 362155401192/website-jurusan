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
                @can('create-cooperations')
                    <div class="col-12 text-right mb-2">
                        <button class="btn btn-primary waves-effect waves-light add" data-toggle="modal"
                            data-target="#cooperationModal" type="button"><i class="feather icon-plus"></i> Tambah
                            Kerjasama Industri</button>
                    </div>
                @endcan
                <table class="table zero-configuration" id="dataTable" data-url="{{ route('cooperations.get-data') }}"
                    width="100%">
                    <thead>
                        <th>No.</th>
                        <th>Nama Industri</th>
                        <th>Nama Kerjasama</th>
                        <th>Jenis Kerjasama</th>
                        <th>Bidang Kerjsama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th>Publish</th>
                        <th></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('backend.cooperation.partials.form')
@endsection

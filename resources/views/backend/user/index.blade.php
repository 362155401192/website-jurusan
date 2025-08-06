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
                @can('create-users')
                    <div class="col-12 text-right mb-2">
                        <button class="btn btn-primary waves-effect waves-light" data-toggle="ajax"
                            data-target="{{ route('users.create') }}"><i class="feather icon-plus"></i> Tambah
                            Data</button>
                    </div>
                @endcan
                <table class="table zero-configuration" id="dataTable" data-url="{{ route('users.get-data') }}"
                    width="100%">
                    <thead>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

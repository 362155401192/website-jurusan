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
                        <button class="btn btn-primary waves-effect waves-light add" data-toggle="modal"
                            data-target="#eventModal" type="button"><i class="feather icon-plus"></i> Tambah Berita/Event</button>
                    </div>

                <table class="table zero-configuration" id="dataTable" data-url="{{ route('events.get-data') }}"
                    width="100%">
                    <thead>
                        <th>No.</th>
                        <th>Judul Berita</th>
                        <th>Tanggal</th>
                        <th>Thumbnail</th>
                        <th>Status</th>
                        <th></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('backend.event.partials.form')
@endsection



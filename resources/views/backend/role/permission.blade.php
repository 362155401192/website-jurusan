@extends('backend.layouts.ajax')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboards') }}" data-toggle="ajax">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('roles') }}" data-toggle="ajax">Role</a>
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
                <form action="{{ route('roles.update-permission', $role->hashid) }}" method="post" data-request="ajax"
                    data-success-callback="{{ route('roles') }}">
                    @csrf

                    <div class="row gy-4">
                        <div class="col-md-12 mb-5">
                            <div class="checkbox d-flex justify-content-center">
                                <div class="vs-checkbox-con vs-checkbox-primary">
                                    <input type="checkbox" class="uid form-check-input" id="uid">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Semua Hak Akses</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row pl-4 pr-4">
                                @foreach ($permissions as $idx => $permission)
                                    @if (getInfoLogin()->roles[0]['name'] == 'Developer')
                                        <div class="col-md-3 col-sm-6" style="margin-bottom: 40px">
                                            @foreach ($permission as $singlePermission)
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" class="uid form-check-input"
                                                        id="uid-{{ $idx . '-' . $loop->iteration }}" name="permission[]"
                                                        value="{{ $singlePermission->name }}"
                                                        {{ $role->hasPermissionTo($singlePermission->name) ? 'checked' : '' }}>
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">{{ $singlePermission->display_name }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        @if (getInfoLogin()->roles[0]['name'] !== 'Developer' && $permission[0] !== 'change-permissions')
                                            <div class="col-md-3 col-sm-6" style="margin-bottom: 10px">
                                                @foreach ($permission as $singlePermission)
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" class="uid form-check-input"
                                                            id="uid-{{ $idx . '-' . $loop->iteration }}" name="permission[]"
                                                            value="{{ $singlePermission->name }}"
                                                            {{ $role->hasPermissionTo($singlePermission->name) ? 'checked' : '' }}>
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class="">{{ $singlePermission->display_name }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <hr class="preview-hr">
                    <button class="btn btn-light waves-effect waves-light mx-1" type="button" data-toggle="ajax"
                        data-target="{{ route('roles') }}"> Kembali</button>
                    <button class="btn btn-primary me-1 waves-effect waves-float waves-light" type="submit"><i
                            class="feather icon-send"></i>
                        Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

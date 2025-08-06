@extends('backend.layouts.ajax')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboards') }}" data-toggle="ajax">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('users') }}" data-toggle="ajax">Users</a>
        </li>
        <li class="breadcrumb-item active">
            {{ $title }}
        </li>
    </ol>
@endsection

@section('content')
    <div class="col-md-6 col-sm-8 col-xs-10 col-12">
        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ $action }}" method="post" data-request="ajax"
                    data-success-callback="{{ route('users') }}">
                    <div class="form-group">
                        <label for="">Nama <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Nama" autocomplete="off"
                            value="{{ isset($data) ? $data->name : '' }}">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    autocomplete="off" value="{{ isset($data) ? $data->email : '' }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Username <span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control" placeholder="Username"
                                    autocomplete="off" value="{{ isset($data) ? $data->username : '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    autocomplete="off" {{ isset($data) ? 'disabled' : '' }}>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Konfirmasi Password <span class="text-danger">*</span></label>
                                <input type="password" name="confirm_password" class="form-control"
                                    placeholder="Konfirmasi Password" autocomplete="off"
                                    {{ isset($data) ? 'disabled' : '' }}>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Role <span class="text-danger">*</span></label>
                        <select name="role" id="" class="form-control">
                            <option value="">Pilih Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}"
                                    {{ isset($data) && $data->roles[0]->name == $role->name ? 'selected' : '' }}>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Foto Profil</label>
                        <input type="file" name="file" id="dropify" class="dropify">
                    </div>
                    <hr>
                    <div class="text-right">
                        <button class="btn btn-light waves-effect waves-light" data-toggle="ajax"
                            data-target="{{ route('users') }}">Kembali</button>
                        <button class="btn btn-primary waves-effect waves-light" type="submit"><i
                                class="feather icon-send"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('_js')
    <script>
        $('#dropify').dropify()
    </script>
@endsection

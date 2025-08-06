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
    <section id="page-account-settings">
        <div class="row">
            <!-- left menu section -->
            <div class="col-md-3 mb-2 mb-md-0">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill"
                                    href="#settings-general" aria-expanded="true">
                                    <i class="feather icon-globe mr-50 font-medium-3"></i>
                                    General
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
                                    href="#settings-seo" aria-expanded="false">
                                    <i class="feather icon-search mr-50 font-medium-3"></i>
                                    SEO
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
                                    href="#settings-social" aria-expanded="false">
                                    <i class="feather icon-facebook mr-50 font-medium-3"></i>
                                    Sosial Media
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
                                    href="#settings-contact" aria-expanded="false">
                                    <i class="feather icon-phone mr-50 font-medium-3"></i>
                                    Kontak
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill"
                                    href="#settings-image" aria-expanded="false">
                                    <i class="feather icon-image mr-50 font-medium-3"></i>
                                    Gambar
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- right content section -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="settings-general"
                                    aria-labelledby="account-pill-general" aria-expanded="true">
                                    <form method="POST" action="{{ route('api.settings') }}" data-request="ajax">
                                        <div class="row">
                                            @foreach ($settings['general'] as $generalSetting)
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label
                                                                for="setting-{{ $generalSetting->option }}">{{ $generalSetting->label }}</label>
                                                            <input name="{{ $generalSetting->option }}" type="text"
                                                                class="form-control"
                                                                id="setting-{{ $generalSetting->option }}"
                                                                placeholder="{{ $generalSetting->label }}"
                                                                value="{{ $generalSetting->value }}" required
                                                                data-validation-required-message="This {{ $generalSetting->label }} field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @csrf
                                            <input type="hidden" value="general" name="group">
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade " id="settings-seo" role="tabpanel"
                                    aria-labelledby="account-pill-password" aria-expanded="false">
                                    <form method="POST" action="{{ route('api.settings') }}" data-request="ajax">
                                        <div class="row">
                                            @foreach ($settings['seo'] as $generalSetting)
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label
                                                                for="setting-{{ $generalSetting->option }}">{{ $generalSetting->label }}</label>
                                                            <input name="{{ $generalSetting->option }}" type="text"
                                                                class="form-control"
                                                                id="setting-{{ $generalSetting->option }}"
                                                                placeholder="{{ $generalSetting->label }}"
                                                                value="{{ $generalSetting->value }}" required
                                                                data-validation-required-message="This {{ $generalSetting->label }} field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @csrf
                                            <input type="hidden" value="seo" name="group">
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade " id="settings-social" role="tabpanel"
                                    aria-labelledby="account-pill-password" aria-expanded="false">
                                    <form method="POST" action="{{ route('api.settings') }}" data-request="ajax">
                                        <div class="row">
                                            @foreach ($settings['social'] as $generalSetting)
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label
                                                                for="setting-{{ $generalSetting->option }}">{{ $generalSetting->label }}</label>
                                                            <input name="{{ $generalSetting->option }}" type="text"
                                                                class="form-control"
                                                                id="setting-{{ $generalSetting->option }}"
                                                                placeholder="{{ $generalSetting->label }}"
                                                                value="{{ $generalSetting->value }}" required
                                                                data-validation-required-message="This {{ $generalSetting->label }} field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @csrf
                                            <input type="hidden" value="social" name="group">
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade " id="settings-contact" role="tabpanel"
                                    aria-labelledby="account-pill-password" aria-expanded="false">
                                    <form method="POST" action="{{ route('api.settings') }}" data-request="ajax">
                                        <div class="row">
                                            @foreach ($settings['contact'] as $generalSetting)
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label
                                                                for="setting-{{ $generalSetting->option }}">{{ $generalSetting->label }}</label>
                                                            <input name="{{ $generalSetting->option }}" type="text"
                                                                class="form-control"
                                                                id="setting-{{ $generalSetting->option }}"
                                                                placeholder="{{ $generalSetting->label }}"
                                                                value="{{ $generalSetting->value }}" required
                                                                data-validation-required-message="This {{ $generalSetting->label }} field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @csrf
                                            <input type="hidden" value="contact" name="group">
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="settings-image" role="tabpanel"
                                    aria-labelledby="account-pill-info" aria-expanded="false">
                                    <form method="POST" action="{{ route('api.settings') }}" data-request="ajax">
                                        <ul class="list-group col mb-4">
                                            @foreach ($settings['image'] as $imageSetting)
                                                <li class="list-group-item">
                                                    <div class="">
                                                        <h4 class="mb-1">{{ $imageSetting->label }}</h4>
                                                        <div class="media">
                                                            <a href="javascript: void(0);">
                                                                <img src="{{ asset('storage/images' . '/' . $imageSetting->value) }}"
                                                                    class="rounded mr-75" alt="profile image"
                                                                    height="64" width="64">
                                                            </a>
                                                            <div class="media-body mt-75">
                                                                <div
                                                                    class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                    <label
                                                                        class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                                        for="setting-{{ $imageSetting->option }}">Upload
                                                                        Foto Baru</label>
                                                                    <input name="{{ $imageSetting->option }}"
                                                                        type="file" class="image-input"
                                                                        id="setting-{{ $imageSetting->option }}" hidden>
                                                                </div>
                                                                <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF
                                                                        or
                                                                        PNG. Max size of 2MB</small></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                            @csrf
                                            <input type="hidden" name="group" value="Image">
                                        </ul>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                changes</button>
                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('_js')
    <script>
        $(function() {
            $('.image-input').on('change', function() {
                const [val] = this.files;
                if (val) $(this).parent().parent().siblings('a').children('img').attr('src', URL
                    .createObjectURL(val));
            });

            $('button[type=reset]').on('click', function() {
                pushState(window.location.href);
            });
        });
    </script>
@endsection

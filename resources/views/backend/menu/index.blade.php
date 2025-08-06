
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
                @can('create-menus')
                    <div class="col-12 text-right mb-2">
                        <button class="btn btn-primary waves-effect waves-light add" data-toggle="modal" data-target="#menuModal"
                            type="button"><i class="feather icon-plus"></i> Tambah
                            Menu</button>
                    </div>
                @endcan
                <table class="table zero-configuration" id="dataTable" data-url="{{ route('menus.get-data') }}"
                    width="100%">
                    <thead style="background-color: #ececec">
                        <th>Nama Menu</th>
                        <th>Link</th>
                        <th>Target</th>
                        <th>Status</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach (getMenu(1, 0, false) as $menuHeader)
                            @if ($menuHeader->is_parent == true)
                                <tr>
                                    <td class="font-weight-bold">{{ $menuHeader->name }}</td>
                                    <td><a href="{{ url($menuHeader->link) }}" target="_blank">{{ $menuHeader->link }}</a></td>
                                    <td>{{ $menuHeader->link_target }}</td>
                                    <td>
                                        <div class="custom-control custom-switch switch-lg custom-switch-primary">
                                            <input type="checkbox" class="custom-control-input"
                                                id="{{ $menuHeader->hashid }}"
                                                {{ $menuHeader->is_active == true ? 'checked' : '' }}
                                                onchange="updateStatus('{{ $menuHeader->hashid }}')">
                                            <label class="custom-control-label" for="{{ $menuHeader->hashid }}">
                                                <span class="switch-text-left">Aktif</span>
                                                <span class="switch-text-right">Tidak Aktif</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        @can('update-menus')
                                            <button class="btn btn-outline-primary btn-sm edit-menu" data-id="{{ $menuHeader->hashid }}" data-toggle="modal" data-target="#menuModal" onclick="editMenu('{{ $menuHeader->hashid }}')">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        @endcan

                                        @can('delete-menus')
                                            <button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="{{ $menuHeader->hashid }}">
                                                <i class="feather icon-trash-2"></i>
                                            </button>
                                        @endcan
                                    </td>


                                    @foreach (getMenu(2, $menuHeader->id, false) as $menuHeader2)
                                        @if ($menuHeader2->is_parent == true)
                                <tr>
                                    <td><span style="margin-left: 30px"
                                            class="font-weight-bold">{{ $menuHeader2->name }}</span></td>
                                            <td><a href="{{ url($menuHeader2->link) }}" target="_blank">{{ $menuHeader2->link }}</a></td>
                                    </td>
                                    <td>{{ $menuHeader2->link_target }}</td>
                                    <td>
                                        <div class="custom-control custom-switch switch-lg custom-switch-primary">
                                            <input type="checkbox" class="custom-control-input"
                                                id="{{ $menuHeader2->hashid }}"
                                                {{ $menuHeader2->is_active == true ? 'checked' : '' }}
                                                onchange="updateStatus('{{ $menuHeader2->hashid }}')">
                                            <label class="custom-control-label" for="{{ $menuHeader2->hashid }}">
                                                <span class="switch-text-left">Aktif</span>
                                                <span class="switch-text-right">Tidak Aktif</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        @can('update-menus')
                                            <button class="btn btn-outline-primary btn-sm edit-menu" data-id="{{ $menuHeader2->hashid }}" data-toggle="modal" data-target="#menuModal" onclick="editMenu('{{ $menuHeader2->hashid }}')">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        @endcan

                                        @can('delete-menus')
                                            <button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="{{ $menuHeader2->hashid }}">
                                                <i class="feather icon-trash-2"></i>
                                            </button>
                                        @endcan
                                    </td>

                                    @foreach (getMenu(3, $menuHeader2->id, false) as $menuHeader3)
                                <tr>
                                    <td><span style="margin-left: 60px">{{ $menuHeader3->name }}</span></td>
                                    <td><a href="{{ url($menuHeader3->link) }}" target="_blank">{{ $menuHeader3->link }}</a></td>
                                    </td>
                                    <td>{{ $menuHeader3->link_target }}</td>
                                    <td>
                                        <div class="custom-control custom-switch switch-lg custom-switch-primary">
                                            <input type="checkbox" class="custom-control-input"
                                                id="{{ $menuHeader3->hashid }}"
                                                {{ $menuHeader3->is_active == true ? 'checked' : '' }}
                                                onchange="updateStatus('{{ $menuHeader3->hashid }}')">
                                            <label class="custom-control-label" for="{{ $menuHeader3->hashid }}">
                                                <span class="switch-text-left">Aktif</span>
                                                <span class="switch-text-right">Tidak Aktif</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        @can('update-menus')
                                            <button class="btn btn-outline-primary btn-sm edit-menu" data-id="{{ $menuHeader3->hashid }}" data-toggle="modal" data-target="#menuModal" onclick="editMenu('{{ $menuHeader3->hashid }}')">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        @endcan

                                        @can('delete-menus')
                                            <button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="{{ $menuHeader3->hashid }}">
                                                <i class="feather icon-trash-2"></i>
                                            </button>
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                            </tr>
                        @else
                            <tr>
                                <td><span style="margin-left: 30px">{{ $menuHeader2->name }}</span></td>
                                <td><a href="{{ url($menuHeader2->link) }}" target="_blank">{{ $menuHeader2->link }}</a></td>
                                <td>{{ $menuHeader2->link_target }}</td>

                                <td>
                                    <div class="custom-control custom-switch switch-lg custom-switch-primary">
                                        <input type="checkbox" class="custom-control-input" id="{{ $menuHeader2->hashid }}"
                                            {{ $menuHeader2->is_active == true ? 'checked' : '' }}
                                            onchange="updateStatus('{{ $menuHeader2->hashid }}')">
                                        <label class="custom-control-label" for="{{ $menuHeader2->hashid }}">
                                            <span class="switch-text-left">Aktif</span>
                                            <span class="switch-text-right">Tidak Aktif</span>
                                        </label>
                                    </div>

                                </td>
                                <td>
                                    @can('update-menus')
                                        <button class="btn btn-outline-primary btn-sm edit-menu" data-id="{{ $menuHeader2->hashid }}" data-toggle="modal" data-target="#menuModal" onclick="editMenu('{{ $menuHeader2->hashid }}')">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    @endcan

                                    @can('delete-menus')
                                        <button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="{{ $menuHeader2->hashid }}">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    @endcan
                                </td>

                            </tr>
                        @endif
                        @endforeach
                        </tr>
                    @else
                        <tr>
                            <td class="font-weight-bold">{{ $menuHeader->name }}</td>
                            <td><a href="{{ url($menuHeader->link) }}" target="_blank">{{ $menuHeader->link }}</a></td>


                            <td>{{ $menuHeader->link_target }}</td>
                            <td>
                                <div class="custom-control custom-switch switch-lg custom-switch-primary">
                                    <input type="checkbox" class="custom-control-input" id="{{ $menuHeader->hashid }}"
                                        {{ $menuHeader->is_active == true ? 'checked' : '' }}
                                        onchange="updateStatus('{{ $menuHeader->hashid }}')">
                                    <label class="custom-control-label" for="{{ $menuHeader->hashid }}">
                                        <span class="switch-text-left">Aktif</span>
                                        <span class="switch-text-right">Tidak Aktif</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                @can('update-menus')
                                    <button class="btn btn-outline-primary btn-sm"  data-id="{{ $menuHeader->hashid }}" onclick="editMenu('{{ $menuHeader->hashid }}')">
                                        <i class="feather icon-edit"></i>
                                    </button>
                                @endcan

                                @can('delete-menus')
                                    <button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="{{ $menuHeader->hashid }}">
                                        <i class="feather icon-trash-2"></i>
                                    </button>
                                @endcan
                            </td>

                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('backend.menu.partials.form')
@endsection

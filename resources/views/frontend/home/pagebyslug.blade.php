
@extends('frontend.layouts.app')
@section('content')
    <!--hero section start-->
    <section class="ptb-120 gradient-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-8">
                    <div class="hero-content-wrap text-white text-center position-relative">
                        <h1 class="text-white">{{ $page->title }} Jurusan</h1>
                        <p class="lead">Bisnis Dan Infomatika Politeknik Negeri Banyuwangi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hero section end-->




    <section class="page-header-section ptb-60">
        <div class="container">
            <div class="post-preview">
                <img src="{{ asset('storage/images/pages/' . $page->image) }}"
                     alt="" class="img-fluid" style="max-width: 35%;" />
            </div>
            <br>
            <h5>{{ $page->title }}</h5>
            <div class="row justify-content">
                <div class="container overflow-hidden text-center">
                    <div class="row gx-6">
                        <div class="col">
                            <div class="h-3 text-left">
                                <div class="post-content">

                                    <p>
                                        {!! $page->content !!}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
        </div>

    </section>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd; /* Garis batas untuk tabel */
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd; /* Garis batas untuk sel */
        }
    </style>

@endsection
@php
    $title = $page->title;
@endphp

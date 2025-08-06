@extends('frontend.layouts.app')

@section('content')

<section class="page-header-section ptb-80 gradient-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="section-heading text-center text-white">
                    <h2 class="text-white">Publikasi Penelitian Dan Pengabdian</h2>
                    <p class="lead">Prodi Teknologi Rekayasa Komputer Jurusan Bisnis Dan Informatika</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-partner-section ptb-60 dark-light-bg">
    <div class="container">

        <div class="row">
            <!-- Kartu Total Publikasi -->
            <div class="col-md-4 mb-4">
                <div class="card text-white" style="background-color: #007bff;">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-left">
                                <p class="text-center" style="color: white;">
                                    <i class="fa fa-book fa-3x"></i>
                                </p>
                            </div>
                            <div class="media-body text-center">
                                <h3 class="media-heading text-semibold">
                                    <p style="color: white; font-size: 30px;">{{ $totalPublications }}</p>
                                </h3>
                                <p>Total Publikasi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kartu Total Penelitian -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-left">
                                <p class="text-center" style="color: white;">
                                    <i class="fa fa-flask fa-3x"></i>
                                </p>
                            </div>
                            <div class="media-body text-center">
                                <h3 class="media-heading text-semibold">
                                    <p style="color: white; font-size: 30px;">{{ $totalResearches }}</p>
                                </h3>
                                <p>Total Penelitian</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kartu Total Pengabdian -->
            <div class="col-md-4 mb-4">
                <div class="card text-white" style="background-color: #fd7e14;">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-left">
                                <p class="text-center" style="color: white;">
                                    <i class="fa fa-hands-helping fa-3x"></i>
                                </p>
                            </div>
                            <div class="media-body text-center">
                                <h3 class="media-heading text-semibold">
                                    <p style="color: white; font-size: 30px;">{{ $totalCommunityServices }}</p>
                                </h3>
                                <p>Total Pengabdian</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


          <!-- Grafik -->
           <!-- Grafik -->
            <div class="card">
                <div class="card-body" style="overflow: hidden;">
                    <div id="chart" style="height: 500px !important;">
                        {!! $chart->container() !!}
                    </div>
                    <script src="{{ $chart->cdn() }}"></script>
                    {{ $chart->script() }}
                </div>
            </div>



    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/larapex-charts/dist/larapex-charts.min.js"></script>

@endsection

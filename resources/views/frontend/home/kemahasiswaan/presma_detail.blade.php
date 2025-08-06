@extends('frontend.layouts.app')
@section('content')
    <!--hero section start-->
    <section class="ptb-120 gradient-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-8">
                    <div class="hero-content-wrap text-white text-center position-relative">
                        <h1 class="text-white">Prestasi Mahasiswa Jurusan</h1>
                        <p class="lead">Bisnis Dan Infomatika Politeknik Negeri Banyuwangi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hero section end-->

    <!--blog details section start-->
    <div class="module ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8">
                    <!-- Achievement -->
                    <article class="post">
                        <div class="post-preview text-center">
                            <img src="{{ asset('storage/images/achievement/' . $achievement->image) }}"
                                alt="article" class="img-fluid" style="max-width: 70%; display: block; margin: 0 auto;" />
                        </div>


                        <div class="post-wrapper">
                            <div class="post-header">
                                <h1 class="post-title">{{ $achievement->title }}</h1>
                                <ul class="post-meta">
                                    <li>{{ $achievement->achievementProgramStudi ->name }}</li>
                                    <li>{{ Carbon\Carbon::parse($achievement->date)->isoFormat('dddd, D MMMM Y') }} </li>
                                    <li>{{ $achievement->location }}</li>

                                </ul>
                            </div>
                            <div class="post-content">
                                {!! $achievement->description!!}
                            </div>
                        </div>
                    </article>
                    <!-- Achievement end -->
                    <!-- Comments area end-->
                </div>

            </div>
        </div>
    </div>
    <!--blog details section end-->


    </div>
@endsection

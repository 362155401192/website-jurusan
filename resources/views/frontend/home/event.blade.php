@extends('frontend.layouts.app')
@section('content')
    <!--hero section start-->
    <section class="ptb-120 gradient-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-8">
                    <div class="hero-content-wrap text-white text-center position-relative">
                        <h1 class="text-white">Berita Jurusan</h1>
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
                    <!-- Post-->
                    <article class="post">
                        <div class="post-preview text-center">
                            <img src="{{ asset('storage/images/events/' . $event->thumbnail) }}"
                                 alt="article" class="img-fluid" style="max-width: 50%; display: block; margin: 0 auto;" />
                        </div>

                        <div class="post-wrapper">
                            <div class="post-header">
                                <h1 class="post-title">{{ $event->title }}</h1>
                                <ul class="post-meta">
                                    <li>{{ Carbon\Carbon::parse($event->date)->isoFormat('dddd, D MMMM Y') }} </li>

                                </ul>
                            </div>
                            <div class="post-content">
                                {!! $event->content !!}
                            </div>
                        </div>
                    </article>
                    <!-- Post end-->
                    <!-- Comments area end-->
                </div>

            </div>
        </div>
    </div>
    <!--blog details section end-->

    </div>
@endsection

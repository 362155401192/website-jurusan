@extends('frontend.layouts.app')
  @section('content')

  <section class="page-header-section ptb-120 gradient-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="section-heading text-center text-white">
                    <h2 class="text-white">Biaya Pendidikan Jurusan</h2>
                    <p class="lead">Bisnis Dan Infomatika Politeknik Negeri Banyuwangi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="review-section ptb-100 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-7">
                <div class="section-heading text-center">
                    <h2>Biaya Pendidikan</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
                        <div class="blog-img mb-2">
                            <img src="{{ asset('storage/images/events/biaya.jpg') }}"
                                class="rounded-top img-fluid" alt="blog">
                        </div>

        </div>
    </div>
</section>

@endsection

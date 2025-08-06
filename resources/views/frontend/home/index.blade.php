  @extends('frontend.layouts.app')
  @section('content')
      <!--hero section start-->
      <section
          class="hero-section position-relative min-vh-100 background-video-overly flex-column d-flex justify-content-center">
          <video poster="{{ asset('assets/frontend/assets/video/poliwangi.mp4') }}"
              class="fit-cover w-100 h-100 position-absolute z--1" autoplay="" muted="" loop="" id="myVideo">
              <source src="{{ asset('assets/frontend/assets/video/poliwangi.mp4') }}" type="video/mp4">
          </video>
          <div class="container">
              <div class="row align-items-center justify-content-center">
                  <div class="col-md-8 col-lg-8">
                      <div class="hero-content-left text-white">
                          <h1 class="text-white display-4 font-weight-bolder">Great ideas are the fuel of progress
                          </h1>
                          <p class="lead mb-4">Jurusan Teknik Infirmatika siap untuk menyiapkan generasi menghadapi kemajuan
                              dengan memberi wadah dalam mempelajari dan mendalami teknologi.
                              Dengan upaya menerapkan penyaluran kreatifitas dan kemampuan dalam pengarahan namun tanpa
                              batasan. </p>
                          {{-- <a href="#" class="btn btn-brand-01 btn-lg"><i class="far fa-comments mr-2"></i>
                              Start a live chat</a> --}}
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!--hero section end-->

      <!--hosting promo start-->
      <section class="promo-section mt-n-150 ">
          <div class="container">
              <div class="row">
                  <div class="col-md-6 col-lg-4">
                      <div class="card hosting-promo border-0 rounded-custom p-4 mt-4 shadow">
                          <div class="card-body">
                              <div class="hosting-promo-icon mb-3 d-flex justify-content-between">
                                  <span class="fad fa-clouds icon-size-lg color-primary"></span>
                              </div>
                              <div class="hosting-promo-content">
                                  <h5 class="h6">Pengumuman</h5>
                                  <p>Temukan pengumuman dan informasi mengenai jurusan disini.</p>

                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                      <div class="card hosting-promo border-0 rounded-custom p-4 mt-4 shadow">
                          <div class="card-body">
                              <div class="hosting-promo-icon mb-3 d-flex justify-content-between">
                                  <span class="fad fa-hdd icon-size-lg color-primary"></span>
                              </div>
                              <div class="hosting-promo-content">
                                  <h5 class="h6">Event Jurusan</h5>
                                  <p>Temukan semua event atau agenda jurusan disini.</p>

                              </div>
                          </div>
                      </div>
                  </div>
                  @php
                  $totalData = count($mahasiswa);
                 @endphp
                  <div class="col-md-6 col-lg-4">
                    <div class="card hosting-promo border-0 rounded-custom p-4 mt-4 shadow">
                        <div class="card-body">
                            <div class="hosting-promo-icon mb-3 d-flex justify-content-between">
                                <!-- Ganti kelas ikon menjadi ikon pengguna -->
                                <span class="fas fa-user icon-size-lg color-primary"></span>
                            </div>
                            <div class="hosting-promo-content">
                                <h5 class="h6">{{ $totalData }} Mahasiswa</h5>
                                <p>Total Jumlah Mahasiswa Aktif Di Jurusan Bisnis Dan Informatika.</p>

                            </div>
                        </div>
                    </div>
                </div>

              </div>
          </div>
      </section>
      <!--hosting promo end-->

      <!--feature section tab style start-->
      <section id="about" class="about-section position-relative overflow-hidden ptb-100 ">
          <div class="container">
              <div class="row align-items-center justify-content-between">
                  <div class="col-md-12 col-lg-6">
                      <div class="feature-contents section-heading">
                          <h2>Jurusan Teknik Informatika</h2>
                          <p>Jurusan Teknik Informatika merupakan jurusan yang berhubungan dengan sistem informasi, ilmu
                              komputer, ilmu informasi, teknik komputer dan aplikasi informasi dalam sistem informasi
                              manajemen. Termasuk di dalamnya kemampuan dalam menganalisis, menilai, memahami, menerapkan
                              dan menciptakan sebuah program perangkat lunak atau software untuk mengolahnya dengan
                              komputer.</p>

                          <ul class="check-list-wrap list-two-col py-3">
                              <li>D4 Teknologi Rekayasa Perangkat Lunak</li>
                              <li>D4 Teknik Rekayasa Komputer</li>
                              <li>D4 Bisnis Digital</li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                      <div class="image-wrap">
                          <img class="img-fluid" src="{{ asset('assets/frontend/assets/img/ti2.jpg ') }}"
                              alt="animation image" style="border-radius: 20px">
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!--feature section tab style end-->

      <!--call to action start-->
      <section class="ptb-60 primary-bg">
          <div class="container">
              <div class="row align-items-center justify-content-between">
                  <div class="col-md-7 col-lg-6">
                      <div class="cta-content-wrap text-white">
                          <h2 class="text-white">Daftarkan Dirimu <br> Sekarang</h2>
                          <p>Jadilah ahli IT professional dengan belajar bersama kami Teknik Informatika Poliwangi. Kami
                              mempunyai slogan Aktif Optimis Solid. </p>
                      </div>
                      <div class="action-btns mt-4">
                          <a href="#" class="btn btn-brand-03"> Daftar Mahasiswa Baru </a>
                      </div>
                  </div>
                  <div class="col-md-5 col-lg-4">
                      <div class="cta-img-wrap text-center">
                          <img src="{{ asset('assets/frontend/assets/img/cta-new.svg') }}" class="img-fluid"
                              alt="server room">
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!--call to action end-->

 <!--testimonial section start-->
<section class="review-section ptb-100 ">
    <style>
        .blog-img {
            width: 100%;
            height: 200px; /* Sesuaikan tinggi gambar sesuai kebutuhan */
            overflow: hidden; /* Untuk memastikan gambar tidak meluas ke luar kotak */
        }

        .blog-img img {
            width: 100%;
            height: auto;
            object-fit: cover; /* Untuk menjaga aspek rasio gambar */
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-7">
                <div class="section-heading text-center">
                    <h2>Berita Dan Event Terbaru</h2>
                    <p>Berita Jurusan Bisnis dan Infomatika Politeknik Negeri Banyuwangi. </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach (getEvents(3) as $item)
                <div class="col-md-6 col-lg-4">
                    <a class="single-blog-article rounded bg-white border d-block mt-4"
                        href="{{ url('event/' . $item->slug) }}">
                        <div class="blog-img mb-2">
                            <img src="{{ asset('storage/images/events/' . $item->thumbnail) }}"
                                class="rounded-top img-fluid" alt="blog">
                        </div>
                        <div class="blog-content-wrap p-4">
                            <div class="article-heading">
                                <h3 class="h5 mb-0">{{ $item->title }}</h3>
                                <span>{{ Carbon\Carbon::parse($item->date)->
                                isoFormat('dddd, D MMMM Y') }}</span>
                            </div>
                            <span class="border-shape my-3"></span>
                            <p>
                                {{ substr($item->summary, 0, 100) }}
                                <span style="color: blue;">... more</span>
                            </p>
                            <div class="article-footer d-flex align-items-center
                            justify-content-between">
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="/all-event" class="btn btn-primary">Lihat Semua Berita Dan Event</a>
        </div>

    </div>
</section>
<!--testimonial section end-->

      <!--application hosting section start-->
      <section class="appliction-hosting ptb-100 gray-light-bg">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-9 col-lg-8">
                      <div class="section-heading text-center mb-5">
                          <h2>Partner Kami</h2>
                          <p class="lead">Kami telah berpartner dengan berbagai industri dan instansi guna meningkatkan
                              kualitas SDM yang kami miliki.</p>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12">
                      <div class="application-hosting-wrap">
                          <ul class="app-list">
                              <li><a href="#" class="white-bg"><img
                                          src="{{ asset('assets/frontend/assets/img/1.png') }}" alt="icon">
                                  </a></li>
                              <li><a href="#" class="white-bg"><img
                                          src="{{ asset('assets/frontend/assets/img/2.png') }}" alt="icon">
                                  </a></li>
                              <li><a href="#" class="white-bg"><img
                                          src="{{ asset('assets/frontend/assets/img/3.png') }}" alt="icon">
                                  </a></li>
                              <li><a href="#" class="white-bg"><img
                                          src="{{ asset('assets/frontend/assets/img/4.jpg') }}" alt="icon">
                                  </a></li>
                              <li><a href="#" class="white-bg"><img
                                          src="{{ asset('assets/frontend/assets/img/5.png') }}" alt="icon">
                                  </a></li>
                              <li><a href="#" class="white-bg"><img
                                          src="{{ asset('assets/frontend/assets/img/6.png') }}" alt="icon">
                                  </a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!--application hosting section end-->
  @endsection

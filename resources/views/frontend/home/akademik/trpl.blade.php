@extends('frontend.layouts.app')
@section('content')
<!--page header section start-->

<section class="page-header-section ptb-120 gradient-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="section-heading text-center text-white">
                    <h3 class="text-white">Prod Teknologi Rekayasa Perangkat Lunak</h3>
                    <p class="lead">Jurusan Bisnis Dan Infomatika Politeknik Negeri Banyuwangi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-header-section ptb-100">
    <div class="container">
        <h4>Program Studi Teknologi Rekayasa Perangkat Lunak</h4>
        <div class="row justify-content">
            <div class="container overflow-hidden text-center">
                <div class="row gx-6">
                    <div class="col">
                        <div class="h-3 text-left">

                            <div style="text-align: justify;">
                                <p style="text-indent: 45px;">Program Studi Teknologi Rekayasa Perangkat Lunak (TRPL) merupakan Program Pendidikan Sarjana Terapan bidang Rekayasa Perangkat Lunak  untuk menunjang berbagai sektor. Program studi ini berfokus menghasilkan lulusan yang siap terjun ke dunia kerja dalam menyelesaikan persoalan-persoalan di bidang keilmuannya, berwawasan global dan mampu bersaing pada tingkat regional, nasional maupun internasional sesuai dengan kebutuhan dan perkembangan industri.</p>
                                <strong><p style="text-align: center;">Visi</p></strong>
                                <p style="text-align: justify;">
                                Menjadi program studi yang berkualitas dan profesional di bidang Teknologi Rekayasa Perangkat Lunak untuk menunjang kebutuhan pasar global pada tahun 2027. d. Misi Program Studi.
                                </p>
                                <strong><p style="text-align: center;">Misi</p></strong>
                                <p style="text-indent: 45px;">Menyelenggarakan pendidikan dalam bidang rekayasa perangkat lunak untuk menghasilkan lulusan terampil, kompetitif, berjiwa pancasila, berkualifikasi nasional Indonesia, serta mampu mengembangkan diri ke jenjang yang lebih tinggi.</p>
                                <strong>
                                <p>LABORATORIUM</p>
                                </strong>
                                <ul style="list-style-type: number; margin: 20px;">
                                <li>LAB. BASIS DATA</li>
                                <li>LAB. MULTIMEDIA</li>
                                <li>LAB. HARDWARE</li>
                                <li>LAB. NIRKABEL</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <strong>
                                <p>AKREDITASI</p>
                            </strong>
                            <a href="{{ asset('storage/archives/akreditasi.pdf') }}" target="_blank">
                                <img src="assets/frontend/assets/img/web/akreditasi.jpg" alt="Sertifikat Akreditasi" width="400px">
                            </a>
                            <hr>

                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Lihat Program Studi TRPL
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="https://trpl.poliwangi.ac.id/" target="_blank">Lihat Website Program Studi TRPL</a>
                                  <a class="dropdown-item" href="/publikasi-prodi-trpl" target="_blank">Lihat Publikasi Program Studi TRPL</a>
                                </div>
                              </div>
                            <br>

                            <br>
                            <strong><p>Keunggulan Program Studi D-IV Teknik Rekayasa Perangkat Lunak</p></strong>
                            <ul style="list-style-type: number; margin: 20px; text-align: justify;">
                                <li>Program studi ini menghasilkan produk-produk rekayasa perangkat lunak yang modern dan inovatif sebagai solusi mengembangkan teknologi di masa kini.</li>
                                <li>Program studi ini menghasilkan lulusan terampil dan komunikatif</li>
                                <li>Pada program studi ini mahasiswa dipersiapkan untuk mampu mengelola hasil riset dan pengembangan yang bisa mendapatkan pengakuan di tingkat regional, nasional dan internasional.</li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
</section>
@endsection

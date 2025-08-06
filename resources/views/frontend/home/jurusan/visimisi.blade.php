@extends('frontend.layouts.app')

@section('content')

<section class="page-header-section ptb-120 gradient-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="section-heading text-center text-white">
                    <h2 class="text-white">Visi & Misi Jurusan</h2>
                    <p class="lead">Bisnis Dan Informatika Politeknik Negeri Banyuwangi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="visi-misi ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="zoom-in">
                <img src="{{ asset('storage/images/ti.png') }}" alt="Logo TI" title="TI" class="img-fluid">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="content pt-4 pt-lg-0">
                    <div class="text-justify">
                        <h4 class="text-center">Visi</h4>
                        <p>Menjadi jurusan Bisnis dan Informatika yang unggul dan terkemuka untuk menunjang kebutuhan pasar global pada tahun 2027.</p>
                        <h4 class="text-center">Misi</h4>
                        <ul class="list-unstyled" style="list-style-type: decimal; margin: 20px;">
                            <li class="mb-2">Menghasilkan lulusan yang memiliki karakteristik berpengetahuan secara utuh, memiliki kemampuan untuk belajar dan beradaptasi, ketajaman bisnis, pengelolaan waktu, kemampuan interpersonal, serta menjunjung tinggi nilai-nilai Pancasila.</li>
                            <li class="mb-2">Berperan aktif dalam pengembangan dan peningkatan sistem pendidikan politeknik di Indonesia bidang teknologi informasi.</li>
                            <li class="mb-2">Aktif menyelenggarakan kegiatan tri dharma perguruan tinggi secara efektif, efisien, dan akuntabel.</li>
                            <li class="mb-2">Menghasilkan produk-produk inovatif menggunakan teknologi informasi.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

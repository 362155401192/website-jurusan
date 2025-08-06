@extends('frontend.layouts.app')
  @section('content')
      <!--page header section start-->
      <section class="page-header-section ptb-120 gradient-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8">
                    <div class="section-heading text-center text-white">
                        <h2 class="text-white">Organisasi Mahasiswa Jurusan</h2>
                        <p class="lead">Bisnis Dan Infomatika Politeknik Negeri Banyuwangi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-header-section ptb-100">

        <style>

        [title~="dimyati"] {
          display: block;
          margin-left: auto;
          margin-right: auto;
        }
        h4 {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: #0c0c0b;
        }

        p{
           font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
           font-size: 17px;

        }
        </style>



          <section id="about" class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6" data-aos="zoom-in">
                            <img src="storage/images/logo.png" title="ti" width="80%">
                        </div>
                        <div class="col-lg-6 d-flex flex-column " data-aos="fade-left">
                            <div class="content pt-4 pt-lg-0">
                                <div style="text-align: justify;">
                                <h2>Tentang HMTI</h2>
                                    <p>HMTI adalah singkatan dari Himpunan Mahasiswa Teknik Informatika. HMTI adalah organisasi mahasiswa yang mewakili mahasiswa program studi Teknik Informatika di sebuah perguruan tinggi atau universitas.</p>
                                    <p style="text-indent: 45px;">Tujuan utama dari HMTI adalah untuk memperkuat hubungan antara mahasiswa Teknik Informatika, meningkatkan pengembangan diri mereka, serta mewakili dan memperjuangkan kepentingan mereka di lingkungan kampus. HMTI juga bertujuan untuk menciptakan lingkungan belajar yang kondusif dan berpartisipasi dalam kegiatan yang berkaitan dengan teknologi informasi.</p>
                                    <p>Peran HMTI dapat mencakup organisasi acara dan kegiatan, seperti seminar, workshop, kompetisi, dan kegiatan sosial lainnya. HMTI juga dapat bekerja sama dengan industri dan komunitas teknologi untuk menghadirkan pembicara tamu, magang, atau peluang kerja bagi mahasiswa Teknik Informatika.</p>
                                    <p style="text-indent: 45px;">Melalui HMTI, mahasiswa Teknik Informatika dapat memperluas jaringan sosial mereka, meningkatkan keterampilan teknis dan kepemimpinan, serta terlibat dalam pengembangan diri dan peningkatan profesionalisme. HMTI juga bisa menjadi wadah untuk berbagi pengetahuan, pengalaman, dan ide antara mahasiswa Teknik Informatika.</p>
                                    <p>Setiap perguruan tinggi atau universitas dapat memiliki HMTI dengan struktur organisasi dan program yang berbeda. Oleh karena itu, informasi lebih lanjut mengenai HMTI di institusi tertentu dapat ditemukan melalui pengurus HMTI setempat atau sumber informasi resmi di kampus tersebut.</p>
                                </div>
                                

                            </div>
                        </div>
                    </div>

                </div>
            </section><!-- End About Section -->
        </section>

@endsection

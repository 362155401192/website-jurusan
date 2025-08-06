@extends('frontend.layouts.app')
  @section('content')

  <section class="page-header-section ptb-120 gradient-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="section-heading text-center text-white">
                    <h2 class="text-white">Profil Jurusan</h2>
                    <p class="lead">Bisnis Dan Infomatika Politeknik Negeri Banyuwangi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

      <section class="page-header-section ptb-100">
    <div class="container">
        <i class="fa-brands fa-youtube"> tipoliwangi.TV</i>
        <i class="fa-brands fa-instagram"> TIPOLIWANGI </i>
        <h4>Bisnis Dan Infomatika</h4>
        <div class="row justify-content">
            <div class="container overflow-hidden text-center">
                <div class="row gx-6">
                    <div class="col">
                        <div class="h-3 text-left">
                        <div style="text-align: justify;">
                                <strong>
                                    <p>PROFIL JURUSAN</p>
                                </strong>
                                    <p style="text-indent: 45px;">Jurusan Bisnis dan Informatika adalah program studi yang menggabungkan pengetahuan bisnis dengan teknologi informasi. Mahasiswa mempelajari aspek-aspek dasar bisnis seperti manajemen, pemasaran, dan keuangan, sambil juga mengembangkan pemahaman tentang penerapan teknologi informasi dalam konteks bisnis. Kurikulum yang beragam mencakup mata kuliah pemrograman, analisis sistem, manajemen basis data, e-commerce, analisis bisnis, keamanan informasi, dan manajemen proyek IT. Lulusan jurusan ini memiliki prospek karir yang luas, termasuk sebagai analis bisnis, konsultan TI, manajer proyek IT, dan manajer bisnis e-commerce.</p>
                                    <p style="text-indent: 45px;">Jurusan Bisnis dan Informatika menjalin kemitraan dengan perusahaan dan industri terkait, memberikan mahasiswa kesempatan untuk terlibat dalam magang, proyek kolaboratif, atau acara industri. Ini membantu mereka memperoleh pengalaman praktis dan membangun jaringan profesional yang berharga. Selain itu, mahasiswa juga dikembangkan dalam soft skills seperti kemampuan komunikasi, kerja tim, pemecahan masalah, dan kepemimpinan. Hal ini penting dalam beradaptasi dengan perubahan industri dan berinteraksi dengan berbagai pihak di dunia bisnis.</p>
                                    <p style="text-indent: 45px;">Melalui program studi Bisnis dan Informatika, mahasiswa memiliki kesempatan untuk menggabungkan pengetahuan bisnis dan teknologi informasi, mempersiapkan mereka untuk berkarir di dunia yang semakin tergantung pada teknologi dan kebutuhan bisnis yang berkembang. Dengan kurikulum yang komprehensif, fasilitas modern, dan pendekatan yang berorientasi pada praktik, jurusan ini bertujuan untuk menciptakan lulusan yang kompeten, inovatif, dan siap menghadapi tantangan di dunia bisnis yang semakin kompleks dan digital.</p>
                                <ul style="list-style-type: number; margin: 20px;">
                                    <strong>
                                    <p>LABORATORIUM</p>
                                    </strong>
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
                            <a class="btn btn-primary" href="/publikasi-jurusan" role="button">Lihat Publikasi Jurusan</a>
                            <br>
                            <br>
                            <strong><p>Prospek Lulusan Jurusan Bisnis dan Infomatika</p></strong>
                            <p style="text-indent: 45px; text-align: justify;">Lulusan Jurusan Bisnis dan Informatika memiliki prospek karir yang baik. Mereka dapat bekerja sebagai analis bisnis, konsultan TI, manajer proyek IT, pengembang aplikasi, manajer bisnis e-commerce, atau memulai usaha sendiri dalam bidang teknologi dan bisnis. Kesempatan karir mereka meliputi berbagai sektor industri seperti perbankan, konsultan, perusahaan teknologi, e-commerce, dan manufaktur. Dengan pengetahuan bisnis dan keterampilan teknologi informasi yang mereka miliki, lulusan ini siap menghadapi tantangan digital di masa depan.</p>

                        </div>
                    </div>
                </div>


</section>
@endsection

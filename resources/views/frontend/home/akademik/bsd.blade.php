@extends('frontend.layouts.app')
@section('content')
<!--page header section start-->

<section class="page-header-section ptb-120 gradient-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="section-heading text-center text-white">
                    <h2 class="text-white">Prodi Bisnis Digital</h2>
                    <p class="lead">Jurusan Bisnis Dan Infomatika Politeknik Negeri Banyuwangi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-header-section ptb-100">
    <div class="container">
        <h4>Program Studi Bisnis Digital</h4>
        <div class="row justify-content">
            <div class="container overflow-hidden text-center">
                <div class="row gx-6">
                    <div class="col">
                        <div class="h-3 text-left">
                            <div style="text-align: justify;">
                                <p style="text-indent: 45px;">Program Studi Bisnis Digital merupakan program studi yang mengajarkan pengetahuan dan keterampilan praktis dalam bidang bisnis digital. Fokus utamanya adalah pada strategi pemasaran digital, analisis data bisnis, manajemen proyek teknologi informasi, dan keamanan informasi. Lulusan program ini dapat mengejar karir sebagai Digital Marketing Specialist, E-Commerce Manager, Data Analyst, atau Project Manager.</p>
                                <strong><p style="text-align: center;">Visi</p></strong>
                                <p style="text-indent: 45px;">Menjadi program studi unggulan dalam menghasilkan lulusan yang kompeten dan siap menghadapi tantangan bisnis digital, serta menjadi pusat keunggulan dalam pengembangan pengetahuan dan praktik bisnis digital.</p>
                                <strong><p style="text-align: center;">Misi</p></strong>
                                <ul style="list-style-type: number; margin: 20px;">
                                    <li>Menyelenggarakan pendidikan berkualitas tinggi yang mengintegrasikan konsep bisnis tradisional dengan strategi pemasaran digital, analisis data bisnis, manajemen proyek teknologi informasi, dan keamanan informasi.</li>
                                    <li>Mengembangkan kurikulum yang relevan dengan perkembangan industri bisnis digital, teknologi terkini, dan tuntutan pasar, sehingga lulusan memiliki keahlian yang dibutuhkan oleh industri.</li>
                                    <li>Mendorong penggunaan metode pembelajaran yang inovatif, termasuk penggunaan teknologi digital dan perangkat lunak bisnis, serta kolaborasi dalam proyek-proyek praktis, untuk mempersiapkan lulusan dengan keterampilan praktis yang diperlukan dalam lingkungan bisnis digital.</li>
                                    <li>Melakukan penelitian dan pengembangan di bidang bisnis digital, termasuk eksplorasi tren terkini, pengembangan model bisnis inovatif, dan identifikasi peluang baru dalam era digital.</li>
                                    <li>Membangun kerjasama yang erat dengan industri dan mitra eksternal, untuk memfasilitasi pengalaman praktis bagi mahasiswa, serta memperkaya kurikulum dengan wawasan industri dan kebutuhan pasar terkini.</li>
                                    <li>Mendorong etika profesional dan tanggung jawab sosial dalam praktik bisnis digital, serta mempromosikan kesadaran akan isu-isu keamanan informasi dan perlindungan data.</li>
                                    <li>Mengembangkan komunitas belajar yang aktif, termasuk kegiatan ekstrakurikuler, seminar, dan lokakarya, untuk meningkatkan pemahaman mahasiswa tentang tren dan perkembangan terbaru dalam bisnis digital.</li>
                                </ul>
                                <p style="text-indent: 45px;">Visi dan misi tersebut bertujuan untuk menjadikan program studi S1 Terapan Bisnis Digital sebagai pilihan yang unggul bagi para calon mahasiswa yang tertarik untuk mengembangkan pengetahuan dan keterampilan dalam bisnis digital. Program studi ini berkomitmen untuk menghasilkan lulusan yang siap berkontribusi dalam dunia bisnis digital dan dapat beradaptasi dengan cepat dengan perkembangan teknologi dan perubahan pasar.</p>
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



                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Lihat Program Studi Bisnis Digital
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="https://bisnisdigital.poliwangi.ac.id/" target="_blank">Lihat Website Program Studi Bisnis Digital</a>
                                  <a class="dropdown-item" href="/publikasi-prodi-bsd" target="_blank">Lihat Publikasi Program Studi isnis Digital</a>
                                </div>
                              </div>

                            <ul style="list-style-type: number; margin: 20px; text-align: justify;">
                                <strong>Keunggulan Program Studi S1 Terapan Bisnis Digital</strong>
                                <li>Program studi ini memiliki tujuan menghasilkan lulusan yang mempunyai kemampuan manajemen dan analisis yang baik</li>
                                <li>Program studi ini menghasilkan lulusan yang memiliki keahlian dalam public speaking dan pemasaran</li>
                                <li>Pada program studi ini mahasiswa dipersiapkan untuk mampu menguasai keahlian tentang metode-metode pengembangan sebuah bisnis dengan pemanfaatan teknologi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection


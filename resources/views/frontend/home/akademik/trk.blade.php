@extends('frontend.layouts.app')
@section('content')
<!--page header section start-->

<section class="page-header-section ptb-120 gradient-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="section-heading text-center text-white">
                    <h3 class="text-white">Prodi Teknologi Rekayasa Komputer</h3>
                    <p class="lead">Jurusan Bisnis Dan Infomatika Politeknik Negeri Banyuwangi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-header-section ptb-100">
    <div class="container">
        <h4>Program Studi Teknologi Rekayasa Komputer</h4>
        <div class="row justify-content">
            <div class="container overflow-hidden text-center">
                <div class="row gx-6">
                    <div class="col">
                        <div class="h-3 text-left ">
                            <div  style="text-align: justify;">
                            <p style="text-indent: 45px;">Program Studi Teknologi Rekayasa Komputer bertujuan menghasilkan program keahlian unggulan dan terdepan dalam mencetak tenaga ahli profesional pada bidang rekayasa perangkat keras berbasis komputer, teknologi jaringan komputer, dan pemeliharaan sistem komputer yang berjiwa kewirausahaan, inovatif, adaptif, dan berdaya saing global.</p>
                            <strong><p style="text-align: center;">Visi</p></strong>
                            <p style="text-indent: 45px;">Menjadi program studi yang unggul dalam pengembangan teknologi komputer yang inovatif dan terkini, serta menghasilkan lulusan yang kompeten dan siap menghadapi tantangan industri.</p>
                            <strong><p style="text-align: center;">Misi</p></strong>
                            <ul style="list-style-type: number; margin: 20px;">
                                <li>Menyelenggarakan pendidikan yang berkualitas tinggi dalam bidang Teknik Rekayasa Komputer dengan mengintegrasikan ilmu pengetahuan dan teknologi terbaru.</li>
                                <li>Mengembangkan kurikulum yang relevan dengan kebutuhan industri dan perkembangan teknologi terkini untuk mempersiapkan lulusan yang siap bekerja.</li>
                                <li>Mendorong penggunaan metode pembelajaran aktif dan berbasis proyek untuk meningkatkan keterampilan praktis dan pemecahan masalah para mahasiswa.</li>
                                <li>Melakukan penelitian dan pengembangan di bidang Teknik Rekayasa Komputer untuk berkontribusi pada perkembangan ilmu pengetahuan dan teknologi.</li>
                                <li>Membangun kerjasama dengan industri dan lembaga terkait untuk memfasilitasi peluang kerja dan magang bagi mahasiswa, serta memastikan relevansi program studi dengan kebutuhan industri.</li>
                                <li>Mendorong partisipasi mahasiswa dalam kegiatan ekstrakurikuler, seminar, dan konferensi untuk meningkatkan pemahaman mereka tentang tren terkini dalam Teknik Rekayasa Komputer.</li>
                                <li>Menjaga integritas dan etika dalam penyelenggaraan pendidikan serta menghasilkan lulusan yang berkomitmen terhadap keunggulan profesional dan tanggung jawab sosial.</li>
                            </ul>
                            <p>Visi dan misi tersebut bertujuan untuk menciptakan program studi yang komprehensif dan relevan dengan kebutuhan industri serta menghasilkan lulusan yang memiliki pengetahuan dan keterampilan yang dibutuhkan dalam bidang Teknik Rekayasa Komputer.</p>
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
                                    Lihat Program Studi TRK
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="https://trk.poliwangi.ac.id/" target="_blank">Lihat Website Program Studi TRK</a>
                                  <a class="dropdown-item" href="/publikasi-prodi-trk" target="_blank">Lihat Publikasi Program Studi TRK</a>
                                </div>
                              </div>
                            <br>

                            <ul style="list-style-type: number; margin: 20px; text-align: justify;">
                            <strong>Keunggulan Program Studi D-IV Teknik Rekayasa Komputer</strong>
                            <li>Program studi ini memiliki tujuan menghasilkan lulusan yang mempunyai kemampuan observarsi dan analisis yang baik</li>
                            <li>Program studi ini menghasilkan lulusan yang memiliki keahlian problem solving terutama di bidang komputer dan jaringan</li>
                            <li>Pada program studi ini mahasiswa dipersiapkan untuk mampu menguasai keahlian di bidang networking dan database yang sangat dibutuhkan oleh industri.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection


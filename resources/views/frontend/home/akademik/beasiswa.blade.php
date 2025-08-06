
@extends('frontend.layouts.app')
  @section('content')

  <section class="page-header-section ptb-120 gradient-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="section-heading text-center text-white">
                    <h2 class="text-white">Beasiswa Jurusan</h2>
                    <p class="lead">Bisnis Dan Infomatika Politeknik Negeri Banyuwangi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-header-section ptb-100">
    <div class="container">
        <h3>Informasi Beasiswa</h3>
        <div class="row justify-content">
            <div class="container overflow-hidden text-center">
                <div class="row gx-6">
                    <div class="col">
                        <div class="h-3 text-left">
                            <strong>
                                <p class="h4">Beasiswa Bidikmisi</p>
                            </strong>
                           <div style="text-align: justify;">
                                    <p class="h5" style="text-indent: 45px;">A. Gambaran Umum</p>
                                    <p style="text-indent: 45px;">Bidikmisi adalah bantuan biaya pendidikan dari pemerintah bagi lulusan Sekolah Menengah Atas (SMA) atau sederajat yang memiliki potensi akademik baik tetapi memiliki keterbatasan ekonomi.  Bidikmisi bertujuan untuk meningkatkan akses dan kesempatan belajar di perguruan tinggi; meningkatkan prestasi mahasiswa; menjamin keberlangsungan studi mahasiswa dengan tepat waktu; dan melahirkan lulusan yang mandiri, produktif serta memiliki kepedulian sosial sehingga mampu berperan dalam upaya pemutusan mata rantai kemiskinan dan pemberdayaan masyarakat.</p>
                                    <p style="text-indent: 45px;">Penerima Bidikmisi adalah siswa SMA atau sederajat yang akan lulus pada tahun berjalan atau lulus 1 (satu) tahun sebelumnya yang memiliki potensi akademik baik  tetapi memiliki keterbatasan ekonomi yang didukung bukti dokumen yang sah dan lulus seleksi penerimaan mahasiswa baru pada perguruan tinggi.   Keterbatasan ekonomi dibuktikan dengan kepemilikan Kartu Indonesia Pintar (KIP) atau pendapatan kotor gabungan orang tua/wali sebesar Rp4.000.000,00 (empat juta rupiah) atau pendapatan kotor gabungan orang tua/wali dibagi jumlah anggota keluarga maksimal Rp750.000,00 (tujuh ratus lima puluh ribu rupiah). Calon penerima bidikmisi wajib terdaftar pada sistem Bidikmisi dengan memasukkan NPSN dan NISN yang valid.</p>
                                    <p class="h5" style="text-indent: 45px;">B. Dasar Hukum</p>
                                    <ul style="list-style-type: number; margin: 20px;">
                                        <li>Undang - Undang Republik Indonesia Nomor 12 Tahun 2012 tentang Pendidikan Tinggi (Lembaran Negara Republik Indonesia Tahun 2012 Nomor 158, tambahan Lembaran Negara Republik Indonesia Nomor 336);</li>
                                        <li>Peraturan Pemerintah Nomor 4 Tahun 2014 tentang Penyelenggaraan Pendidikan Tinggi dan Pengelolaan Perguruan Tinggi (Lembaran Negara Republik Indonesia Tahun 2014 Nomor 16, Tambahan Lembaran Negara Republik Indonesia Nomor 5500);</li>
                                        <li>Peraturan Menteri Riset, Teknologi dan Pendidikan Tinggi Nomor 6 Tahun 2019 tentang Bantuan Biaya Pendidikan Bagi Mahasiswa Miskin Berprestasi (Berita Negara Republik Indonesia Tahun 2019 Nomor 78)</li>
                                    </ul>
                                    <p class="h5" style="text-indent: 45px;">C. Tahapan Pendaftaran</p>
                                    <ol style="list-style-type: number; margin: 20px;">
                                        <li>Bagi siswa :</li>
                                        <ul style="list-style-type: disc; margin: 20px;">
                                            <li>Penerima KIP dapat langsung melakukan pendaftaran secara mandiri pada laman Bidikmisi sampai mendapatkan KAP dan PIN (langsung ke poin 5).</li>
                                            <li>Bukan penerima KIP mendaftar ke sekolah untuk direkomendasikan.</li>
                                        </ul>
                                        <li>Bagi sekolah :</li>
                                        <ul style="list-style-type: disc; margin: 20px;">
                                            <li>Sudah memiliki Kode Akses Sekolah langsung merekomendasikan masing-masing siswa melalui laman Bidikmisi menggunakan kombinasi NPSN dan NISN.</li>
                                            <li>Belum memiliki Kode Akses Sekolah mendaftarkan diri sebagai institusi pemberi rekomendasi ke laman Bidikmisi dengan melampirkan hasil pindaian (scan) (Lampiran 1 bagian persetujuan dan tanda tangan). Ditjen Belmawa Kemenristekdikti memveriﬁkasi pendaftaran sekolah dan mengeluarkan Kode Akses Sekolah (1 x 24 jam pada hari dan jam kerja)</li>
                                            <li>Sekolah memberikan nomor pendaftaran dan kode akses kepada siswa yang sudah direkomendasikan.</li>
                                            <li>Siswa mendaftar melalui laman Bidikmisi dan menyelesaikan semua tahapan dalam sistem pendaftaran sampai mendapatkan KAP dan PIN.</li>
                                            <li>KAP dan PIN yang didapat dari sistem Bidikmisi digunakan dalam pendaftaran seleksi masuk perguruan tinggi.</li>
                                            <li>Bagi calon mahasiswa penerima Bidikmisi yang telah dinyatakan diterima di Perguruan Tinggi, akan dilakukan veriﬁkasi lebih lanjut dan penetapan kelayakan mahasiswa penerima Bidikmisi oleh perguruan tinggi dengan mempertimbangkan dokumen pendukung.</li>
                                        </ul>
                                    </ol>
                                    <p class="h5" style="text-indent: 45px;">D. Tujuan Dan Manfaat</p>
                                    <ul style="list-style-type: number; margin: 20px;">
                                    <li>Meningkatkan akses dan kesempatan belajar di perguruan  tinggi bagi mahasiswa yang tidak mampu secara ekonomi  namun memiliki prestasi akademik yang baik.</li>
                                    <li>Meningkatkan prestasi mahasiswa, baik pada bidang kurikuler,  kokurikuler, maupun ekstrakurikuler.</li>
                                    <li>Menjamin keberlangsungan studi mahasiswa dengan tepat waktu.</li>
                                    <li>Melahirkan lulusan yang mandiri, produktif, dan memiliki  kepedulian sosial sehingga mampu berperan dalam upaya  pemutusan mata rantai kemiskinan dan pemberdayaan  masyarakat.</li>
                                    </ul>
                                    <p class="h5" style="text-indent: 45px;">E. Gambar Foto</p>
                                    <img src="storage/images/events/ALUR-BEASISWA-300x273.png" style="display:block; margin:auto;" >
                                    <p class="h4" style="margin: 40px">BEASISWA PPA (Peningkatan Prestasi Akademik)</p>
                                    <p class="h5" style="text-indent: 45px;">A. Gambaran Umum</p>
                                    <p style="text-indent: 45px;">Undang-undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional, Bab V pasal 12 (1.c), menyebutkan bahwa setiap peserta didik pada setiap satuan pendidikan berhak mendapatkan beasiswa bagi yang berprestasi yang orang tuanya tidak mampu membiayai pendidikannya. Pasal 12 (1.d), menyebutkan bahwa setiap peserta didik pada setiap satuan pendidikan berhak mendapatkan biaya pendidikan bagi mereka yang orang tuanya tidak mampu membiayai pendidikannya.Selain itu di dalamUndang-undang Nomor 12 Tahun 2012 tentang Pendidikan Tinggidi dalam Pasal 76 Ayat (2) juga jelas mengamanahkan tentang pemenuhan hak mahasiswa yaitu pemerintah harus memberikan: (a) beasiswa kepada Mahasiswa berprestasi; (b) bantuan atau membebaskan biaya Pendidikan; dan/atau (c)pinjaman dana tanpa bunga yang wajib dilunasi setelah lulus dan/atau memperoleh pekerjaan.</p>
                                    <p style="text-indent: 45px;">Dijelaskan lebih lanjut di dalam penjelasan, yang dimaksud dengan “beasiswa” adalah dukungan biaya Pendidikanyang diberikan kepada Mahasiswa untuk mengikuti dan/atau menyelesaikan Pendidikan Tinggi berdasarkan pertimbangan utama prestasi dan/atau potensi akademik. Sedangkan “bantuan biaya pendidikan” adalah dukungan biaya Pendidikan yang diberikan kepada Mahasiswa untuk mengikuti dan/atau menyelesaikan Pendidikan Tinggi berdasarkan pertimbangan utama keterbatasan kemampuan ekonomi.</p>
                                    <p style="text-indent: 45px;">Peraturan Pemerintah Nomor 48 tahun 2008 tentang Pendanaan Pendidikan, Bagian Kelima, Pasal 27 ayat (1), menyebutkan bahwa Pemerintahdan pemerintah daerah sesuai kewenangannya memberi bantuan biaya pendidikan atau beasiswa kepada peserta didik yang orang tua atau walinya tidak mampu membiayai pendidikannya. Pasal 27 ayat (2), menyebutkan bahwa Pemerintah dan pemerintah daerah sesuai dengan kewenangannya dapat memberi beasiswa kepada peserta didik yang berprestasi.</p>
                                    <p>Mengacu kepada Undang-undang dan Peraturan Pemerintah tersebut, maka Pemerintah melalui Direktorat Jenderal Pembelajaran dan Kemahasiswaan, mengupayakan pemberian beasiswa bagi mahasiswa yang berprestasi.</p>
                                    <p class="h5" style="text-indent: 45px;">B. Dasar Hukum</p>
                                    <p>Sebagai acuan dalam melaksanakan rekrutmen Beasiswa Peningkatan Prestasi Akademik (PPA) maka kegiatan ini harus didasarkan pada :</p>
                                    <ul style="list-style-type: number; margin: 20px;">
                                        <li>Undang-Undang Republik Indonesia Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional.</li>
                                        <li>Undang-undang Republik Indonesia Nomor 12 Tahun 2012 tentang Pendidikan Tinggi.</li>
                                        <li>Peraturan Pemerintah Nomor 48 Tahun 2008 tentang Pendanaan Pendidikan.</li>
                                        <li>Peraturan Pemerintah Nomor 4Tahun 2014tentang Penyelenggaraan PendidikanTinggi dan Pengelolaan Perguruan Tinggi.</li>
                                    </ul>
                                    <p class="h5" style="text-indent: 45px;">C. Tujuan dan Manfaat</p>
                                    <p>Setiap aktiftas yang dilakukan oleh seluruh sivitas akademik diharapkan memiliki tujuan dan manfaat bagi semua yang terlibat, penetapan mahasiswa penerima beasiswa PPA dilakukan dengan tujuan dan manfaat sebagai berikut :</p>
                                    <ul style="list-style-type: number; margin: 20px;">
                                        <li>Mendorong mahasiswa penerima untuk lebih berprestasi baik kurikuler, ko-kurikuler,maupun ekstrakurikulerserta memotivasi mahasiswa lain untuk lebih berprestasi.</li>
                                        <li>Memberikan penghargaan bagi mahasiswa yang berprestasi.</li>
                                        <li>Mengurangi jumlah mahasiswa yang putus kuliah, karena tidak mampu membiayai pendidikan.</li>
                                    </ul>
                                    <p class="h5" style="text-indent: 45px;">D. Gambar Foto</p>
                                    <img src="storage/images/events/PPA.jpg" style="display:block; margin:auto;" >
                                </div>
                           
                           
                        </div>
                      
                    </div>
                
                  
                </div>
        </div>
        
</section>

  @endsection

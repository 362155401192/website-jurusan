<!--footer section start-->
<footer class="footer-1 ptb-60 gradient-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-4 mb-4 mb-md-4 mb-sm-4 mb-lg-0">
                <a href="#" class="navbar-brand mb-2">
                    <img src="{{ asset('storage/images/' . getSetting('logo')) }}" width="19%" alt="logo"
                        class="img-fluid">
                </a>
                <br>
                <p>{{ getSetting('address') }}</p>
                <p>
                    Telp: {{ getSetting('phone') }} <br>
                    Email: {{ getSetting('email') }} <br>
                </p>
                <ul class="list-inline social-list-default background-color social-hover-2 mt-2">
                    <li class="list-inline-item"><a class="facebook" href="#"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item"><a class="youtube" href="#"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li class="list-inline-item"><a class="instagram" href="#"><i
                                class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="row mt-0">
                    <div class="col-sm-6 col-md-3 col-lg-3 mb-4 mb-sm-4 mb-md-0 mb-lg-0">
                        <h6 class="font-weight-normal">Kerjasama</h6>
                        <ul>
                            <li>
                                <a href="#">Kerjasama Dalam Negeri</a>
                            </li>
                            <li>
                                <a href="#">Alumni</a>
                            </li>
                            <li>
                                <a href="#">Urusan Internasional</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 mb-4 mb-sm-4 mb-md-0 mb-lg-0">
                        <h6 class="font-weight-normal">Tentang Jurusan</h6>
                        <ul>
                            <li>
                                <a href="#">Sambutan Kajur</a>
                            </li>
                            <li>
                                <a href="#">Sejarah</a>
                            </li>
                            <li>
                                <a href="#">Visi dan Misi</a>
                            </li>
                            <li>
                                <a href="#">Organisasi </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 mb-4 mb-sm-4 mb-md-0 mb-lg-0">
                        <h6 class="font-weight-normal">Poliwangi</h6>
                        <ul>
                            <li>
                                <a href="#">Peta Kampus</a>
                            </li>
                            <li>
                                <a href="#">Agenda</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <h6 class="font-weight-normal">Pendaftaran</h6>
                        <ul>
                            <li>
                                <a href="#">SNPMN</a>
                            </li>
                            <li>
                                <a href="#">SBMPN</a>
                            </li>
                            <li>
                                <a href="#">Mandiri</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of container-->
</footer>
<!--footer bottom copyright start-->
<div class="footer-bottom py-3 gray-light-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7">
                <div class="copyright-wrap small-text">
                    <p class="mb-0">&copy; {{ date('Y') }} Teknik Informatika Politeknik Negeri Banyuwangi</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="terms-policy-wrap text-lg-right text-md-right text-left">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a class="small-text" href="terms-condition.html">Terms &
                                Condition</a></li>
                        <li class="list-inline-item"><a class="small-text" href="privacy-policy.html">Privacy
                                Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer bottom copyright end-->
<!--footer section end-->

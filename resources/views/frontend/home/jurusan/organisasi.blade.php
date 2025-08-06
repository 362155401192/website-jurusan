@extends('frontend.layouts.app')
@section('content')

<section class="page-header-section ptb-120 gradient-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="section-heading text-center text-white">
                    <h2 class="text-white">Struktur Organisasi Jurusan</h2>
                    <p class="lead">Bisnis Dan Infomatika Politeknik Negeri Banyuwangi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="privacy-policy ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <figure class="org-chart cf">
                    <div class="board">
                        <ul class="columnOne director">
                            <li>
                                <span class="highlight">
                                    <a href="/detail-staff/mohamad-dimyati-ayatullah-s-t-m-kom">
                                        <img src="storage/images/employees/dimyati.jpg" alt="" width="45px ">
                                        <strong>Kepala Jurusan</strong>
                                        <br>Mohamad Dimyati Ayatullah, S.T.,M.Kom</a>
                                </span>
                            </li>
                        </ul>
                        <ul class="columnThree">
                            <li class="department">
                                <a href="/detail-staff/dianni-yusuf-s-kom-m-kom">
                                    <span>
                                        <img src="storage/images/employees/dianni.jpg" alt="" width="50px ">
                                        <strong>Kepala Prodi D-IV TRPL</strong>
                                        <br>Dianni Yusuf, S.Kom.,M.Kom
                                    </span>
                                </a>
                            </li>
                            <li class="department">
                                <a href="/detail-staff/galih-hendra-wibowo-s-tr-kom-m-t">
                                    <span>
                                    <img src="storage/images/employees/galih.jpg" alt="" width="50px ">
                                        <strong>Kepala Prodi D-IV TRK</strong>
                                        <br>Galih Hendra Wibowo, S.Tr.Kom.,M.T
                                    </span>
                                </a>
                            </li>
                            <li class="department">
                                <a href="/detail-staff/i-wayan-suardinata-s-kom-m-kot">
                                    <span>
                                    <img src="storage/images/employees/wayan.jpg" alt="" width="50px ">
                                        <strong>Kepala Prodi D-IV BSD</strong>
                                        <br>I Wayan Suardinata, S.Kom.,M.T

                                    </span>
                                </a>
                            </li>
                        </ul>
                        <ul class="columnOne">
                            <li>
                                <a href="/staff">
                                    <span>
                                        <img src="" alt="">
                                        <strong>Dosen dan Staff</strong>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <ul class="columnOne">
                            <li>
                                <a href="/staff">
                                    <span>
                                        <strong>Teknisi dan Administrasi</strong>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <ul class="columnOne">
                            <li>
                                <a href="https://www.instagram.com/tipoliwangi/">
                                    <span>
                                        <strong>Himpunan Mahasiswa</strong>
                                        <br>Mahasiswa Teknik Informatika
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </figure>
        </div>
    </div>
    </div>
</section>


<style>
    .content * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    a,
    .content {
        font-family: 'Titillium Web', sans-serif;
        font-size: 18px;
        color: #00264c;
        position: relative;
        text-decoration: none
    }

    .highlight a {
        color: #00264c;
        text-decoration: none
    }

    a:hover,
    a:focus {
        text-decoration: underline;
        color: #00264c
    }

    .org-chart ul li span:hover {
        background: #1266cd;
        background: #dee2e6;
        color: #00264c;
        text-decoration: none;
        box-shadow: none;
        transition: 0.5s
    }

    .org-chart {
        display: block;
        clear: both;
        margin-bottom: 25px;
        position: relative
    }

    /**  * For IE 6/7 only */
    .org-chart.cf:before,
    .org-chart.cf:after {
        content: " ";
        /* 1 */
        display: table;
        /* 2 */
    }

    .org-chart.cf:after {
        clear: both
    }

    .org-chart.cf {
        *zoom: 1
    }

    .org-chart ul {
        padding: 0;
        margin: 0;
        list-style: none
    }

    .org-chart ul li {
        position: relative
    }

    .org-chart .board {
        width: 100%;
        margin: 0 auto;
        display: block;
        position: relative
    }

    /* riga centrale */
    .org-chart .board:before {
        content: "";
        display: block;
        position: absolute;
        height: 700px;
        width: 0px;
        border-left: 4px solid #1266cd;
        margin-left: 50%;
        top: 45px
    }

    /* stile del box */
    .org-chart ul li span {
        text-decoration: none;
        box-shadow: 4px 4px 9px -4px rgb(0 0 0 / 40%);
        -webkit-transition: all linear .1s;
        -moz-transition: all linear .1s;
        transition: all linear .1s;
        display: block;
        margin: 1%;
        margin-top: 0;
        padding: 0.8rem 0.2rem;
        text-align: center;
        background: whitesmoke;
        border-top: 15px solid #dee2e6;
        border-top: 15px solid #1266cd;
        word-break: break-word;
        border-top-right-radius: 6px;
        margin: 0px 4px
    }

    /* stile del box in evidenza */
    .org-chart .highlight {
        background: white;
        color: #fff
    }

    /* Righe e definizione altezze */
    .org-chart ul.columnOne,
    .org-chart ul.columnTwo,
    .org-chart ul.columnThree {
        position: relative;
        width: 100%;
        display: block;
        clear: both
    }

    .org-chart ul.columnOne.director,
    .org-chart ul.columnOne.subdirector {
        height: 150px
    }

    .org-chart ul.columnOne {
        height: 170px
    }

    .org-chart ul.columnTwo {
        height: 160px
    }

    .org-chart ul.columnThree {
        height: 170px
    }

    /* Riga columnOne */
    .org-chart ul.columnOne li {
        width: 100%;
        max-width: 320px;
        margin-top: 2px;
        margin: 0px auto
    }

    /* Riga subdirector */
    .org-chart ul.columnOne.subdirector li {
        width: 100%;
        max-width: 320px;
        float: right;
        margin-right: 5px
    }

    .org-chart ul.columnOne.subdirector:before {
        content: "";
        display: block;
        width: 40%;
        height: 25px;
        border-top: 4px solid #1266cd;
        border-right: 4px solid #1266cd;
        border-left: 0;
        margin-top: 0px;
        margin-left: 50%
    }

    /* Riga columnTwo */
    .org-chart ul.columnTwo li {
        width: 30%;
        float: right;
        margin: 0px 4px;
        flex-basis: 100%
    }

    .org-chart ul.columnTwo:before {
        content: "";
        display: block;
        position: relative;
        width: 60%;
        height: 10px;
        border-top: 2px solid blue;
        margin: 0 auto;
        top: 40px
    }

    /* Riga columnThree */
    .org-chart ul.columnThree {
        width: 100%;
        display: flex;
        display: -ms-flexbox;
        flex-wrap: wrap;
        -webkit-flex-wrap: wrap;
        -ms-flex-flow: row wrap;
        justify-content: space-between;
        clear: both
    }

    .org-chart ul.columnTwo li {
        max-width: 320px;
        flex-grow: 1;
        flex-shrink: 1;
        flex-basis: 0
    }

    .org-chart ul.columnThree li {
        max-width: 320px;
        margin: 0px 4px;
        flex-grow: 1;
        flex-shrink: 1;
        flex-basis: 30%
    }

    .org-chart ul.departments li.department {
        display: inline-flex;
        flex-grow: 1;
        flex-shrink: 1;
        flex-basis: 0
    }

    .org-chart ul.columnThree:before {
        content: "";
        display: block;
        position: relative;
        width: 80%;
        height: 10px;
        border-top: 4px solid #1266cd;
        border-left: 0;
        border-right: 0;
        margin: 0 auto;
        top: 55px;
        flex-basis: 100%;
        margin-left: 10%;
        margin-right: 10%
    }

    /* Riga departments */
    .org-chart ul.departments {
        width: 100%;
        display: flex;
        display: -ms-flexbox;
        flex-wrap: wrap;
        -webkit-flex-wrap: wrap;
        -ms-flex-flow: row wrap;
        justify-content: space-between;
        clear: both
    }

    .org-chart ul.departments:before {
        content: "";
        display: block;
        width: 85%;
        height: 25px;
        border-top: 4px solid #1266cd;
        border-left: 4px solid #1266cd;
        border-right: 4px solid #1266cd;
        margin: 0 auto;
        margin-top: 60px;
        flex-basis: 100%;
        margin-left: 10%;
        margin-right: 9.5%
    }

    .org-chart ul.departments .department:after {
        content: "";
        position: absolute;
        display: block;
        width: 10px;
        height: 25px;
        border-left: 4px solid #1266cd;
        left: 50%;
        top: -25px
    }

    /* MEDIA QUERIES */
    @media all and (max-width: 991px) {
        .org-chart .board {
            margin: 0px;
            width: 100%
        }

        .org-chart ul li span,
        .org-chart ul.columnOne li,
        .org-chart ul.columnTwo li,
        .org-chart ul.columnThree,
        .org-chart ul.columnThree li,
        .org-chart ul.departments,
        .org-chart ul.departments li,
        .org-chart ul.departments li.department {
            float: none;
            width: auto;
            max-width: none;
            display: block;
            clear: both;
            height: auto;
            margin-bottom: 5px
        }

        .org-chart ul.columnThree li.department {
            margin-bottom: 25px
        }

        .org-chart .board:before {
            height: 800px
        }

        .org-chart .board ul:nth-child(4)>li:before {
            content: "";
            display: block;
            position: absolute;
            height: 704px;
            width: 0px;
            border-left: 4px solid #1266cd;
            top: 0px;
            left: 4px;
            z-index: 9
        }

        .org-chart ul.departments li,
        .org-chart ul.departments li.department {
            margin-left: 40px;
            height: 120px
        }

        .org-chart ul.departments li.department:before {
            content: "";
            display: block;
            position: absolute;
            height: 20px;
            width: 40px;
            border-top: 4px solid #1266cd;
            margin-left: -35px;
            top: 30px;
            z-index: 9
        }

        .org-chart ul.departments:before,
        .org-chart ul.columnThree:before,
        .org-chart ul.departments .department:after {
            display: none
        }
    }
</style>
@endsection

  @extends('frontend.layouts.app')
  @section('content')
      <!--page header section start-->
      <section class="page-header-section ptb-120 gradient-bg">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-9 col-lg-8">
                      <div class="section-heading text-center text-white">
                          <h2 class="text-white">Kerjasama Industri</h2>
                          <p class="lead">Kami telah menjalin kerjasama dengan industri guna mendukung proses pembelajaran
                              mahasiswa agar siap di dunia kerja.</p>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!--page header section end-->


      <!--privacy policy start-->
      <section class="privacy-policy ptb-100">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 col-lg-12">
                      <div class="content-with-sidebar">
                          <div class="section-heading">
                              <h3>Kerjasama Industri</h3>
                          </div>
                          <div id="nav-id-1" class="pt-2">
                              <div class="row">
                                  <div class="col-sm-12">
                                      <div class="table-responsive-lg">
                                          <table class="table table-bordered domain-price-table">
                                              <thead>
                                                  <tr>
                                                      <td class="dp-title">No</td>
                                                      <td class="dp-title">Nama Industri/Instansi</td>
                                                      <td class="dp-title">Nama Kerjasama</td>
                                                      <td class="dp-title">Jenis Kerjasama</td>
                                                      <td class="dp-title">Bidang Kerjasama</td>
                                                      <td class="dp-title">Periode Kerjasama</td>
                                                      <td class="dp-title">Manfaat</td>
                                                      <td class="dp-title">Hasil Kerjasama</td>
                                                  </tr>
                                              </thead>
                                              <tbody class="domain-price-body">
                                                  @foreach ($cooperations as $item)
                                                      <tr>
                                                          <td>{{ $loop->iteration }}</td>
                                                          <td>{{ $item->partner->name }}</td>
                                                          <td>{{ $item->name }}</td>
                                                          <td>{{ $item->cooperationType->name }}</td>
                                                          <td>{{ $item->cooperationField->name }}</td>
                                                          <td>{{ $item->date_start . ' s/d ' . $item->date_end }}</td>
                                                          <td>{{ $item->benefit }}</td>
                                                          <th>
                                                            <a href="{{ $item->link }}" target="_blank">Lihat Hasil kerjasama</a>
                                                        </th>

                                                      </tr>
                                                  @endforeach
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
          </div>
      </section>
  @endsection

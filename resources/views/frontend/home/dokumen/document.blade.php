  @extends('frontend.layouts.app')
  @section('content')
      <!--page header section start-->
      <section class="page-header-section ptb-120 gradient-bg">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-9 col-lg-8">
                      <div class="section-heading text-center text-white">
                          <h2 class="text-white">Dokumen Arsip</h2>
                          <p class="lead">Dokumen Arsip Jurusan Teknik Informatika Politeknik Negeri Banyuwangi.</p>
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
                              <h3>Dokumen Arsip</h3>
                          </div>
                          <div id="nav-id-1" class="pt-2">
                              <div class="row">
                                  <div class="col-sm-12">
                                      <div class="table-responsive-lg">
                                          <table class="table table-bordered domain-price-table">
                                              <thead>
                                                  <tr>
                                                      <td class="dp-title">No</td>
                                                      <td class="dp-title">Nama Dokumen</td>
                                                      <td class="dp-title">File Dokumen</td>
                                                      <td class="dp-title">Jenis Dokumen</td>
                                                      <td class="dp-title">Catatan</td>
                                                      <td class="dp-title">Referensi</td>
                                                  </tr>
                                              </thead>
                                              <tbody class="domain-price-body">
                                                  @foreach ($documents as $item)
                                                      <tr>
                                                          <td>{{ $loop->iteration }}</td>
                                                          <td>{{ $item->title }}</td>
                                                          <td><a target="_blank"
                                                                  href="{{ asset('storage/documents/' . $item->file) }}">Lihat
                                                                  Dokumen</a>
                                                          </td>
                                                          <td>{{ $item->documentType->name }}</td>
                                                          <td>{{ $item->description == null ? '-' : $item->description }}
                                                          </td>
                                                          <td>
                                                              @if ($item->link == null)
                                                                  -
                                                              @else
                                                                  <a href="{{ $item->link }}">Link</a>
                                                              @endif
                                                          </td>
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

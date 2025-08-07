<div class="modal fade text-left" id="indikatorModal" tabindex="-1" role="dialog" aria-labelledby="indikatorModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="indikatorModal">Tambah Indikator Kinerja</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="indikatorForm" method="POST" data-request="ajax" data-success-callback="{{ route('indikator-kinerja-kegiatan.index') }}">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" id="kode" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="program_studi" class="form-label">Program Studi</label>
                            <select name="program_studi" id="program_studi" class="form-control" required>
                                <option value="">-- Pilih Program Studi --</option>
                                <option value="TRPL" {}>TRPL</option>
                                <option value="TRK">TRK</option>
                                <option value="BSD">BSD</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="sasaran_kinerja_id" class="form-label">Sasaran Kinerja</label>
                            <select name="sasaran_kinerja_id" id="sasaran_kinerja_id" class="form-control" required>
                                <option value="">-- Pilih Sasaran --</option>
                                @foreach ($sasaran as $s)
                                    <option value="{{ $s->id }}">{{ $s->kode }} - {{ $s->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="target_akhir" class="form-label">Target Akhir</label>
                            <input type="number" class="form-control" name="target_akhir" id="target_akhir"
                                step="0.01">
                        </div>

                        <div class="col-md-6">
                            <label for="realisasi_akhir" class="form-label">Realisasi Akhir</label>
                            <input type="number" class="form-control" name="realisasi_akhir" id="realisasi_akhir"
                                step="0.01">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary waves-effect waves-light" type="submit"><i class="feather icon-send"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

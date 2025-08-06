<!-- Modal -->
<div class="modal fade" id="indikatorModal" tabindex="-1" aria-labelledby="indikatorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="indikatorForm">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="id" id="id">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Indikator Kinerja Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="kode">Kode</label>
                            <select name="kode" id="kode" class="form-control">
                                <option value="">-- Pilih Kode --</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="sasaran_kinerja_id" class="form-label">Sasaran Kinerja</label>
                            <select name="sasaran_kinerja_id" id="sasaran_kinerja_id" class="form-control" required>
                                <option value="">-- Pilih Sasaran --</option>
                                @foreach ($sasaran as $s)
                                    <option value="{{ $s->id }}">{{ $s->kode }} - {{ $s->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="target_akhir" class="form-label">Target Akhir</label>
                            <input type="number" class="form-control" name="target_akhir" id="target_akhir" step="0.01">
                        </div>

                        <div class="col-md-6">
                            <label for="realisasi_akhir" class="form-label">Realisasi Akhir</label>
                            <input type="number" class="form-control" name="realisasi_akhir" id="realisasi_akhir" step="0.01">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

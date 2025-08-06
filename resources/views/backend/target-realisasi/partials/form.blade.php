<div class="modal fade" id="targetRealisasiModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="targetRealisasiForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Target Realisasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Indikator</label>
                        <select class="form-control" name="indikator_kinerja_kegiatan_id" id="indikator_kinerja_kegiatan_id" required>
                            <option value="">Pilih Indikator</option>
                            @foreach ($indikator as $i)
                                <option value="{{ $i->id }}">{{ $i->kode }} - {{ $i->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label>Triwulan</label>
                        <select class="form-control" name="triwulan" required>
                            <option value="1">Triwulan 1</option>
                            <option value="2">Triwulan 2</option>
                            <option value="3">Triwulan 3</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label>Target</label>
                        <input type="number" step="0.01" name="target" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Realisasi</label>
                        <input type="number" step="0.01" name="realisasi" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label>File Pendukung</label>
                        <input type="file" name="file_pendukung" class="form-control">
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

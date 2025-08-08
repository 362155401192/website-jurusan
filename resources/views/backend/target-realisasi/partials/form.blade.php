<div class="modal fade text-left" id="realisasiModal" tabindex="-1" role="dialog" aria-labelledby="realisasiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="realisasiModalLabel">Tambah Target Realisasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="targetRealisasiForm" action="{{ route('target-realisasi.store') }}" method="POST" data-request="ajax" data-success-callback="{{ route('target-realisasi.index') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Indikator</label>
                        <select class="form-control" name="indikator_kinerja_kegiatan_id"
                            id="indikator_kinerja_kegiatan_id" required>
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
                        <input type="file" name="file_pendukung" class="form-control dropify" id="dropify">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="feather icon-send"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

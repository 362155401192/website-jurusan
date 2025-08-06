<div class="modal fade" id="achievementModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="achievementForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="id" id="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Prestasi Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-md-6">
                        <label>Judul</label>
                        <input type="text" name="title" id="title" class="form-control"
                            placeholder="title" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label>Lokasi</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Tanggal</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Nama Mahasiswa</label>
                        <input type="text" name="nama_mahasiswa" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Program Studi</label>
                        <select name="achievement_program_studi_id" class="form-control" required>
                            <option value="">-- Pilih Program Studi --</option>
                            @foreach ($achievementProgramStudis as $item)
                                <option value="{{ Hashids::encode($item->id) }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Tingkat Prestasi</label>
                        <select name="achievement_level_id" class="form-control" required>
                            <option value="">-- Pilih Tingkat --</option>
                            @foreach ($achievementLevels as $item)
                                <option value="{{ Hashids::encode($item->id) }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Jenis Prestasi</label>
                        <select name="achievement_type_id" class="form-control" required>
                            <option value="">-- Pilih Jenis --</option>
                            @foreach ($achievementTypes as $item)
                                <option value="{{ Hashids::encode($item->id) }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Penyelenggara</label>
                        <input type="text" name="penyelenggara" id="penyelenggara" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Juara</label>
                        <input type="text" name="juara" id="juara" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Dosen Pembimbing</label>
                        <input type="text" name="dosen_pembimbing" id="dosen_pembimbing" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Link Sertifikat</label>
                        <input type="text" name="link_sertifikat" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Gambar</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>

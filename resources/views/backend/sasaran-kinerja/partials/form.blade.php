<!-- Modal -->
<div class="modal fade" id="sasaranModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="sasaranForm" method="POST">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="id" id="id">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Sasaran Kinerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <select name="kode" id="kode" class="form-control">
                            <option value="">-- Pilih Kode --</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="sasaran_kinerja" class="form-label">Nama Sasaran Kinerja</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
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

<script>
fetch('/apps/sasaran_kinerja/kode-options')
    .then(response => response.json())
    .then(data => {
        const select = document.getElementById('kode');
        data.forEach(kode => {
            const option = document.createElement('option');
            option.value = kode;
            option.textContent = kode;
            select.appendChild(option);
        });
    });
</script>

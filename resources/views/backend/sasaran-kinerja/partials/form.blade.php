<div class="modal fade text-left" id="sasaranModal" tabindex="-1" role="dialog" aria-labelledby="sasaranModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="sasaranModal">Tambah Sasaran Kinerja</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="sasaranForm" method="POST" data-request="ajax" data-success-callback="{{ route('sasaran-kinerja.index') }}">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" name="kode" id="kode" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="sasaran_kinerja" class="form-label">Nama Sasaran Kinerja</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary waves-effect waves-light" type="submit"><i class="feather icon-send"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// fetch('/apps/sasaran_kinerja/kode-options')
//     .then(response => response.json())
//     .then(data => {
//         const select = document.getElementById('kode');
//         data.forEach(kode => {
//             const option = document.createElement('option');
//             option.value = kode;
//             option.textContent = kode;
//             select.appendChild(option);
//         });
//     });
</script>

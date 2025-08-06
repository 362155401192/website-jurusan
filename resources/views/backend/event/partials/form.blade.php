<div class="modal fade text-left" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="eventModalLabel">Tambah Event/Berita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="eventForm" action="{{ route('events.store') }}" method="POST" data-request="ajax" data-success-callback="{{ route('events') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                    <div class="form-group">
                        <label for="title">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Judul Berita" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="summary">Ringkasan Berita <span class="text-danger">*</span></label>
                        <input type="text" name="summary" id="summary" class="form-control" placeholder="Ringkasan Berita" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="content">Konten Berita <span class="text-danger">*</span></label>
                        <textarea name="content" id="content" class="form-control" placeholder="Isi konten berita..." rows="6" autocomplete="off"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Event/Berita <span class="text-danger">*</span></label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="slug" id="slug" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Foto Event/Berita</label>
                        <input type="file" name="thumbnail" id="dropify" class="dropify">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary waves-effect waves-light" type="submit"><i class="feather icon-send"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('_js')
    @parent
    <script src="{{ asset('assets/backend/ckeditor/ckeditor.js') }}"></script>
    <script>
        // Inisialisasi Dropify
        $('#dropify').dropify();

        // Inisialisasi CKEditor
        var editor = CKEDITOR.replace('content', {
            // Konfigurasi CKEditor, jika diperlukan
        });

        // Menyembunyikan notifikasi peringatan
        editor.on('instanceReady', function() {
            editor.on('notificationShow', function(event) {
                if (event.data.message.indexOf('This CKEditor 4.22.1 version is not secure.') !== -1) {
                    event.cancel();
                }
            });
        });

        // Update data CKEditor saat form disubmit
        document.querySelector('#eventForm').addEventListener('submit', function() {
            // Update semua instance CKEditor yang ada
            for (const instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        });

        // Fungsi untuk mengubah string menjadi slug
        function stringToSlug(str) {
            return str.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
        }

        // Event listener ketika judul berita diubah
        $('#title').on('input', function() {
            var title = $(this).val();
            var slug = stringToSlug(title);
            $('#slug').val(slug);
        });
    </script>
@endsection

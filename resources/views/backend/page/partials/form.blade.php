<div class="modal fade text-left" id="pageModal" tabindex="-1" role="dialog" aria-labelledby="pageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="pageModalLabel">Tambah Halaman Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="pageForm" action="{{ route('pages.store') }}" method="POST" data-request="ajax" data-success-callback="{{ route('pages') }}" enctype="multipart/form-data">
                <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                    <div class="form-group">
                        <label for="title">Judul Halaman <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Judul halaman" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="content">Konten Halaman <span class="text-danger">*</span></label>
                        <textarea name="content" id="content" class="form-control" placeholder="Isi konten halaman..." rows="6" autocomplete="off"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="menu_page">Pilih Menu Yang Dipakai <span class="text-danger">*</span></label>
                        <select name="menu_page" class="form-control" id="menu_page">
                            <option value="">Pilih menu</option>
                            @foreach ($menus as $item)
                                <option value="{{ $item->hashid }}" data-link="{{ $item->link }}" @if ($item->is_parent) style="font-weight: bold;" @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="slug">URL: https:// <span class="text-danger"></span></label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="URL" autocomplete="off" readonly>
                    </div>
                    <div class="form-group">
                        <label for="dropify">Foto Profil</label>
                        <input type="file" name="file" id="dropify" class="dropify">
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
    <script src="{{ asset('assets/backend/ckeditor/ckeditor.js') }}"></script>
    <script>
        // Inisialisasi Dropify
        $('#dropify').dropify();

        // Inisialisasi CKEditor untuk textarea konten
        var editor = CKEDITOR.replace('content');

        // Menyembunyikan notifikasi peringatan
        editor.on('instanceReady', function() {
            editor.on('notificationShow', function(event) {
                if (event.data.message.indexOf('This CKEditor 4.22.1 version is not secure.') !== -1) {
                    event.cancel();
                }
            });
        });

        // Update data CKEditor saat form disubmit
        document.querySelector('#pageForm').addEventListener('submit', function() {
            // Update semua instance CKEditor yang ada
            for (const instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        });

        // Event listener untuk mengisi field URL berdasarkan pilihan menu
        document.getElementById('menu_page').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var link = selectedOption.getAttribute('data-link');
            document.getElementById('slug').value = link;
        });
    </script>
@endsection

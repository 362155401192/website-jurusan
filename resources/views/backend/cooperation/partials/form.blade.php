<div class="modal fade text-left" id="cooperationModal" tabindex="-1" role="dialog" aria-labelledby="cooperationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="cooperationModalLabel">Tambah Jenis Kerjasama</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="cooperationForm" action="{{ route('cooperations.store') }}" method="POST" data-request="ajax" data-success-callback="{{ route('cooperations') }}">
                @csrf
                <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                    <div class="form-group">
                        <label for="partner_s">Nama Industri <span class="text-danger">*</span></label>
                        <select name="partner_s" id="partner_s" class="form-control">
                            <option value="">Pilih Industri</option>
                            @foreach ($partners as $item)
                                <option value="{{ $item->hashid }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Jenis Kerjasama <span class="text-danger">*</span></label>
                        <textarea name="name" id="name" class="form-control" placeholder="Nama Jenis Kerjasama" autocomplete="off" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cooperation_type">Jenis Kerjasama <span class="text-danger">*</span></label>
                        <select name="cooperation_type" id="cooperation_type" class="form-control">
                            <option value="">Pilih Jenis Kerjasama</option>
                            @foreach ($cooperationTypes as $item)
                                <option value="{{ $item->hashid }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cooperation_field">Bidang Kerjasama <span class="text-danger">*</span></label>
                        <select name="cooperation_field" id="cooperation_field" class="form-control">
                            <option value="">Pilih Bidang Kerjasama</option>
                            @foreach ($cooperationFields as $item)
                                <option value="{{ $item->hashid }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="benefit">Manfaat <span class="text-danger">*</span></label>
                        <textarea name="benefit" id="benefit" class="form-control" placeholder="Manfaat" autocomplete="off" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date_start">Tanggal Mulai <span class="text-danger">*</span></label>
                        <input type="date" name="date_start" id="date_start" class="form-control" placeholder="Tanggal Mulai" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="date_end">Tanggal Berakhir <span class="text-danger">*</span></label>
                        <input type="date" name="date_end" id="date_end" class="form-control" placeholder="Tanggal Berakhir" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="link">Hasil Kerjasama <span class="text-danger">*</span></label>
                        <input name="link" id="link" class="form-control" placeholder="link" autocomplete="off"></input>
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
    <script>
        // Tambahkan inisialisasi Dropify atau script lainnya di sini jika diperlukan
    </script>
@endsection

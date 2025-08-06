<div class="modal fade text-left" id="partnerModal" tabindex="-1" role="dialog" aria-labelledby="partnerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="partnerModalLabel">Tambah Partner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="partnerForm" action="{{ route('partners.store') }}" method="POST" data-request="ajax" data-success-callback="{{ route('partners') }}">
                @csrf
                <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                    <div class="form-group">
                        <label for="name">Nama Partner <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Partner" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Nomor Telepon <span class="text-danger">*</span></label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Nomor Telepon" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat <span class="text-danger">*</span></label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Alamat" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="file">Foto Profil</label>
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
    @parent
    <script>
        $('#dropify').dropify();
    </script>
@endsection

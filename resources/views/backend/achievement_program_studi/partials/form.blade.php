<div class="modal fade text-left" id="achievementProgramStudiModal" tabindex="-1" role="dialog"
    aria-labelledby="achievementProgramStudiModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="achievementProgramStudiModal">Tambah Program Studi Prestasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="achievementProgramStudiForm" action="{{ route('achievement-program-studis.store') }}" method="POST"
                data-request="ajax" data-success-callback="{{ route('achievement-program-studis') }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Program Studi Prestasi <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Nama Program Studi Prestasi" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary waves-effect waves-light" type="submit"><i
                            class="feather icon-send"></i>
                        Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

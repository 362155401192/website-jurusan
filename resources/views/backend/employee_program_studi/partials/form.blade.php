<div class="modal fade text-left" id="employeeProgramStudiModal" tabindex="-1" role="dialog" aria-labelledby="employeeProgramStudiModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="employeeProgramStudiModal">Tambah Program Studi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="employeeProgramStudiForm" action="{{ route('employee-program-studis.store') }}" method="POST" data-request="ajax"
                data-success-callback="{{ route('employee-program-studis') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Program Studi <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Nama Program Studi" autocomplete="off">
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

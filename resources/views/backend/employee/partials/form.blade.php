<div class="modal fade text-left" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="employeeModalLabel">Tambah Staff</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="employeeForm" action="{{ route('employees.store') }}" method="POST" data-request="ajax" data-success-callback="{{ route('employees') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                    <div class="form-group">
                        <label for="identity_number">Nomor Identitas (NIK/NIP/NIDN) <span class="text-danger">*</span></label>
                        <input type="text" name="identity_number" id="identity_number" class="form-control" placeholder="Nomor Identitas (NIK/NIP/NIDN)" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Staff (Beserta gelar) <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Staff" autocomplete="off" required>
                    </div>
                    <!-- Inputan Baru id_sdm -->
                    <div class="form-group">
                        <label for="id_sdm">Id Publikasi (Opsional)</label>
                        <input type="text" name="id_sdm" id="id_sdm" class="form-control" placeholder="ID SDM" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="male">Laki-Laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="employee_type">Jenis Staff <span class="text-danger">*</span></label>
                        <select name="employee_type" id="employee_type" class="form-control" required>
                            <option value="">Pilih Jenis Staff</option>
                            @foreach ($employeeTypes as $item)
                                <option value="{{ $item->hashid }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="employee_status">Status Staff <span class="text-danger">*</span></label>
                        <select name="employee_status" id="employee_status" class="form-control" required>
                            <option value="">Pilih Status Staff</option>
                            @foreach ($employeeStatuses as $item)
                                <option value="{{ $item->hashid }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="employee_program_studi">Program Studi <span class="text-danger">*</span></label>
                        <select name="employee_program_studi" id="employee_program_studi" class="form-control" required>
                            <option value="">Pilih Program Studi</option>
                            @foreach ($employeeProgramStudis as $item)
                                <option value="{{ $item->hashid }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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

        // Fungsi untuk membuat slug
        function string_to_slug(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // menghapus aksara yang tidak diperlukan dan mengganti spasi dengan dash
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to   = "aaaaeeeeiiiioooouuuunc------";
            for (var i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // menghapus karakter yang tidak valid
                .replace(/\s+/g, '-') // ganti spasi dengan dash
                .replace(/-+/g, '-'); // gabungkan dash

            return str;
        }

        // Event ketika nama diisi
        $('#name').on('input', function() {
            var nama = $(this).val();
            var slug = string_to_slug(nama);
            $('#slug').val(slug);
        });
    </script>
@endsection

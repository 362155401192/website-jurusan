
$(document).ready(function () {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // Inisialisasi DataTable manual
    var groupColumn = 1;

    var table = $('#indikatorTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/apps/indikator_kinerja_kegiatans/list',
            type: 'GET',
            data: function (d) {
                d.program_studi = $('#filterProdi').val(); // Ambil value dari filter
                d.tahun = $('#filterTahun').val(); // Ambil value dari filter
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'sasaran', name: 'sasaran' }, // <-- kolom untuk grouping
            { data: 'kode', name: 'kode' },
            { data: 'program_studi', name: 'program_studi' },
            { data: 'year', name: 'year',defaultContent: '-' },
            { data: 'deskripsi', name: 'deskripsi' },
            { data: 'target_akhir', name: 'target_akhir' },
            { data: 'realisasi_akhir', name: 'realisasi_akhir' },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
        order: [[groupColumn, 'asc']],
        displayLength: 25,
        columnDefs: [
            { visible: false, targets: groupColumn } // sembunyikan kolom 'sasaran'
        ],
        drawCallback: function (settings) {
            var api = this.api();
            var rows = api.rows({ page: 'current' }).nodes();
            var last = null;

            api.column(groupColumn, { page: 'current' }).data().each(function (group, i) {
                if (last !== group) {
                    $(rows).eq(i).before(
                        `<tr class="group bg-light fw-bold text-dark">
                        <td colspan="8">Sasaran Kinerja: ${group}</td>
                    </tr>`
                    );
                    last = group;
                }
            });
        }
    });

    $('#filterProdi').on('change', function () {
        table.ajax.reload(); // Reload datatable dengan data filter baru
    });

    $('#filterTahun').on('change', function () {
        table.ajax.reload(); // Reload datatable dengan data filter baru
    });

    function generateNewCode(sasaranId) {
        const baseUrl = window.location.origin;
        fetch(`${baseUrl}/apps/indikator_kinerja_kegiatans/last_code?sasaran_kinerja_id=${sasaranId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('kode').value = data.kode;
            })
            .catch(error => {
                console.error('Gagal fetch kode baru:', error);
            });
    }

    // Saat pilih sasaran kinerja
    $('#sasaran_kinerja_id').on('change', function () {
        const sasaranId = $(this).val();
        if (sasaranId) { // Hanya jika tambah baru, bukan edit
            generateNewCode(sasaranId);
        }
    });

    window.showForm = function (id = null) {
        $('#indikatorForm')[0].reset();
        $('#id').val('');
        console.log(id);

        if (id) {
            $.get(`/apps/indikator_kinerja_kegiatans/${id}`, function (res) {
                $('#id').val(res.id);
                $('#kode').val(res.kode);
                $('#program_studi').val(res.program_studi);
                $('#deskripsi').val(res.deskripsi);
                $('#year').val(res.year);
                $('#target_akhir').val(res.target_akhir);
                $('#realisasi_akhir').val(res.realisasi_akhir);
                $('#sasaran_kinerja_id').val(res.sasaran_kinerja_id);
                $('#indikatorModal').modal('show');
            });
        } else {
            $('#indikatorModal').modal('show');
        }
    };

    $('#indikatorForm').on('submit', function (e) {
        e.preventDefault();

        let form = $(this);
        let id = $('#id').val();
        let url = id ? `/apps/indikator_kinerja_kegiatans/${id}/update` : '/apps/indikator_kinerja_kegiatans/store';

        let formData = form.serialize();

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function () {
                $('#indikatorModal').modal('hide');
                $('#indikatorForm')[0].reset();
                table.ajax.reload();

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil disimpan.',
                    timer: 2000,
                    showConfirmButton: false
                });
            },
            error: function (xhr) {
                let errorMessage = 'Terjadi kesalahan saat menyimpan data.';

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: errorMessage,
                });
                console.error(xhr.responseText);
            }
        });
    });

    // function loadKodeOptions(selected = null) {
    //     $.get('/apps/indikator_kinerja_kegiatans/kode-options', function (data) {
    //         const select = $('#kode');
    //         select.empty().append('<option value="">-- Pilih Kode --</option>');
    //         $.each(data, function (i, kode) {
    //             select.append(`<option value="${kode}" ${selected === kode ? 'selected' : ''}>${kode}</option>`);
    //         });
    //     });
    // }


    window.deleteData = function (id) {
        Swal.fire({
            title: 'Hapus?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#fcb040',
            cancelButtonColor: '#6c757d',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/apps/indikator_kinerja_kegiatans/${id}`,
                    type: 'DELETE',
                    data: { _token: $('meta[name="csrf-token"]').attr('content') },
                    success: function (res) {
                        if (res.status) {
                            Swal.fire('Berhasil!', 'Data telah dihapus.', 'success');
                            table.ajax.reload();
                        } else {
                            Swal.fire('Gagal', res.message, 'error');
                        }
                    },
                    error: function () {
                        Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus data.', 'error');
                    }
                });
            }
        });
    };

    $('#indikatorModal').on('hidden.bs.modal', function () {
        $('#indikatorForm')[0].reset();
        $('#id').val('');
    });
});

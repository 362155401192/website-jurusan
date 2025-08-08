$(document).ready(function () {

    let groupColumn = 1;

    var table = $('#targetRealisasiTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('#targetRealisasiTable').data('url'),
        columns: [
            {
                name: 'id',
                data: null,
                width: '1%',
                mRender: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'sasaran',
                name: 'sasaran',
                visible: false
            },
            {
                data: 'indikator',
                name: 'indikator'
            },
            {
                data: 'tw1_target',
                name: 'tw1_target'
            },
            {
                data: 'tw1_realisasi',
                name: 'tw1_realisasi'
            },
            {
                data: 'tw2_target',
                name: 'tw2_target'
            },
            {
                data: 'tw2_realisasi',
                name: 'tw2_realisasi'
            },
            {
                data: 'tw3_target',
                name: 'tw3_target'
            },
            {
                data: 'tw3_realisasi',
                name: 'tw3_realisasi',
            },
            {
                name: 'id',
                data: 'id',
                width: 150,
                sortable: false,
                mRender: function (data, type, row) {
                    var render = ``
                    render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editRealisasi('${row.kode?.id}')"><i class="feather icon-edit"></i></button> `
                    render += `<button class="btn btn-outline-danger btn-sm" onclick="deleteData('${row.kode?.indikator_kinerja_kegiatan_id}')"><i class="feather icon-trash-2"></i></button> `;
                    return render
                }
            }
        ],
        order: [[groupColumn, 'asc']],
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
                        <td colspan="10">Sasaran Kinerja: ${group}</td>
                    </tr>`
                    );
                    last = group;
                }
            });
        }
    });



    $('.add').on('click', function () {
        resetInvalid();
        $("#targetRealisasiForm")[0].reset()
        $('#realisasiModal .modal-title').html('Tambah Target Realisasi');
        $('#realisasiModal form').attr('action', `${window.location.href}/store`);
    });

    window.editRealisasi = function (id) {
        $('#realisasiModal form').attr('action', `${window.location.origin}/apps/target_realisasis/${id}/update`);
        $("#targetRealisasiForm")[0].reset()
        fetch(`${window.location.origin}/apps/target_realisasis/${id}/show`)
            .then(res => res.json())
            .then(data => {
                resetInvalid();
                $('#realisasiModal .modal-title').html('Edit Staff');
                $('#indikator_kinerja_kegiatan_id').val(data.indikator_kinerja_kegiatan_id || '');
                $('select[name="triwulan"]').val(data.triwulan || '');
                $('input[name="target"]').val(data.target ?? '');
                $('input[name="realisasi"]').val(data.realisasi ?? '');
                if (data.file_pendukung) {
                    $('#filePendukungLabel').text(data.file_pendukung);
                } else {
                    $('#filePendukungLabel').text('');
                }
                $('#realisasiModal').modal('show');
            });
            
            $('#indikator_kinerja_kegiatan_id, select[name="triwulan"]').on('change', function () {
                let indikatorId = $('#indikator_kinerja_kegiatan_id').val();
                let triwulan = $('select[name="triwulan"]').val();

                if (indikatorId && triwulan) {
                    fetch(`${window.location.origin}/apps/target_realisasis/find?indikator_kinerja_kegiatan_id=${indikatorId}&triwulan=${triwulan}`)
                        .then(res => res.json())
                        .then(data => {
                            if (data) {
                                $('input[name="target"]').val(data.target ?? '');
                                $('input[name="realisasi"]').val(data.realisasi ?? '');
                                if (data.file_pendukung) {
                                    $('#filePendukungLabel').text(data.file_pendukung);
                                } else {
                                    $('#filePendukungLabel').text('');
                                }
                                // Update form action jika mau edit data yang sudah ada
                                $('#realisasiModal form').attr('action', `${window.location.origin}/apps/target_realisasis/${data.id}/update`);
                            } else {
                                // Kalau data tidak ada, kosongkan input
                                $('input[name="target"]').val('');
                                $('input[name="realisasi"]').val('');
                                $('#filePendukungLabel').text('');
                                // Ubah form action ke route create (kalau mau insert baru)
                                $('#realisasiModal form').attr('action', '{{ route("target-realisasi.store") }}');
                            }
                        });
                }
            });
    }


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
                    url: `/apps/target_realisasis/${id}/delete`,
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
});


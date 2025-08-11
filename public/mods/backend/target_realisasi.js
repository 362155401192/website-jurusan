$(document).ready(function () {

    let groupColumn = 1;
    const currentMonth = new Date().getMonth();
    var table = $('#targetRealisasiTable').DataTable({
        // destroy: true,
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
                name: 'tw1_target',
                mRender: function (data, type, row) {
                    return `<input type="text" class="form-control editable-cell"
                    data-indikator-id="${row.kode?.indikator_kinerja_kegiatan_id ?? ''}"
                    data-triwulan="1"
                    data-id="${row.id ?? ''}"
                    data-field="target"
                    value="${data ?? ''}"
                    style="max-width: 100px; width: 100%">`;
                }
            },
            {
                data: 'tw1_realisasi',
                name: 'tw1_realisasi',
                mRender: function (data, type, row) {
                    let disabled = (currentMonth >= 0 && currentMonth <= 3) ? '' : 'readonly';
                    return `<input type="text" class="form-control editable-cell"
                    data-indikator-id="${row.kode?.indikator_kinerja_kegiatan_id ?? ''}"
                    data-triwulan="1"
                    data-field="realisasi"
                    data-id="${row.id ?? ''}"
                    value="${data ?? ''}" ${disabled}
                    style="max-width: 100px; width: 100%">`;
                }
            },
            {
                data: 'tw2_target',
                name: 'tw2_target',
                mRender: function (data, type, row) {
                    return `<input type="text" class="form-control editable-cell"
                    data-indikator-id="${row.kode?.indikator_kinerja_kegiatan_id ?? ''}"
                    data-triwulan="2"
                    data-field="target"
                    data-id="${row.id ?? ''}"
                    value="${data ?? ''}"
                    style="max-width: 100px; width: 100%">`;
                }
            },
            {
                data: 'tw2_realisasi',
                name: 'tw2_realisasi',
                mRender: function (data, type, row) {
                    let disabled = (currentMonth >= 4 && currentMonth <= 7) ? '' : 'readonly';
                    return `<input type="text" class="form-control editable-cell"
                    data-indikator-id="${row.kode?.indikator_kinerja_kegiatan_id ?? ''}"
                    data-triwulan="2"
                    data-field="realisasi"
                    value="${data ?? ''}" ${disabled}
                    data-id="${row.id ?? ''}"
                    style="max-width: 100px; width: 100%">`;
                }
            },
            {
                data: 'tw3_target',
                name: 'tw3_target',
                mRender: function (data, type, row) {
                    return `<input type="text" class="form-control editable-cell"
                    data-indikator-id="${row.kode?.indikator_kinerja_kegiatan_id ?? ''}"
                    data-triwulan="3"
                    data-field="target"
                    value="${data ?? ''}"
                    data-id="${row.id ?? ''}"
                    style="max-width: 100px; width: 100%">`;
                }
            },
            {
                data: 'tw3_realisasi',
                name: 'tw3_realisasi',
                mRender: function (data, type, row) {
                    let disabled = (currentMonth >= 8 && currentMonth <= 11) ? '' : 'readonly';
                    return `<input type="text" class="form-control editable-cell"
                    data-indikator-id="${row.kode?.indikator_kinerja_kegiatan_id ?? ''}"
                    data-triwulan="3"
                    data-field="realisasi"
                    value="${data ?? ''}" ${disabled}
                    data-id="${row.id ?? ''}"
                    style="max-width: 100px; width: 100%">`;
                }
            },
            {
                name: 'id',
                data: 'id',
                width: 150,
                sortable: false,
                mRender: function (data, type, row) {
                    var render = ``
                    // render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editRealisasi('${row.kode?.id}')"><i class="feather icon-edit"></i></button> `
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

    // Handle edit cell auto update
    $(document).on('blur', '.editable-cell', async function () {
        let input = $(this);
        let indikatorId = input.data('indikator-id');
        let triwulan = input.data('triwulan');
        let field = input.data('field');
        let value = input.val();

        try {
            let res = await fetch(`${window.location.origin}/apps/target_realisasis/${indikatorId}/${triwulan}/update`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: JSON.stringify({
                    field: field,
                    value: value
                })
            });

            let data = await res.json();
            if (data.status == true) {
                notify("success", data.message);
                Pace.restart();
            } else {
                notify("warning", data.message || 'Gagal memperbarui data');
                Pace.restart();
            }
        } catch (err) {
            notify("warning", 'Terjadi kesalahan koneksi ke server');
        }
    });

    // window.editRealisasi = function (id) {
    //     $('#realisasiModal form').attr('action', `${window.location.origin}/apps/target_realisasis/${id}/update`);
    //     $("#targetRealisasiForm")[0].reset()
    //     fetch(`${window.location.origin}/apps/target_realisasis/${id}/show`)
    //         .then(res => res.json())
    //         .then(data => {
    //             resetInvalid();
    //             $('#realisasiModal .modal-title').html('Edit Staff');
    //             $('#indikator_kinerja_kegiatan_id').val(data.indikator_kinerja_kegiatan_id || '');
    //             $('select[name="triwulan"]').val(data.triwulan || '');
    //             $('input[name="target"]').val(data.target ?? '');
    //             $('input[name="realisasi"]').val(data.realisasi ?? '');
    //             if (data.file_pendukung) {
    //                 $('#filePendukungLabel').text(data.file_pendukung);
    //             } else {
    //                 $('#filePendukungLabel').text('');
    //             }
    //             $('#realisasiModal').modal('show');
    //         });

    //     $('#indikator_kinerja_kegiatan_id, select[name="triwulan"]').on('change', function () {
    //         let indikatorId = $('#indikator_kinerja_kegiatan_id').val();
    //         let triwulan = $('select[name="triwulan"]').val();

    //         if (indikatorId && triwulan) {
    //             fetch(`${window.location.origin}/apps/target_realisasis/find?indikator_kinerja_kegiatan_id=${indikatorId}&triwulan=${triwulan}`)
    //                 .then(res => res.json())
    //                 .then(data => {
    //                     if (data) {
    //                         $('input[name="target"]').val(data.target ?? '');
    //                         $('input[name="realisasi"]').val(data.realisasi ?? '');
    //                         if (data.file_pendukung) {
    //                             $('#filePendukungLabel').text(data.file_pendukung);
    //                         } else {
    //                             $('#filePendukungLabel').text('');
    //                         }
    //                         // Update form action jika mau edit data yang sudah ada
    //                         $('#realisasiModal form').attr('action', `${window.location.origin}/apps/target_realisasis/${data.id}/update`);
    //                     } else {
    //                         // Kalau data tidak ada, kosongkan input
    //                         $('input[name="target"]').val('');
    //                         $('input[name="realisasi"]').val('');
    //                         $('#filePendukungLabel').text('');
    //                         // Ubah form action ke route create (kalau mau insert baru)
    //                         $('#realisasiModal form').attr('action', '{{ route("target-realisasi.store") }}');
    //                     }
    //                 });
    //         }
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


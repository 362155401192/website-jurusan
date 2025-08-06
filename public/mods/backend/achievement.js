$(function () {
    let table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        scrollY: '400px',
        scrollCollapse: true,
        ajax: $('#dataTable').data('url'),
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'title' },
            { data: 'nim' },
            { data: 'nama_mahasiswa' },
            { data: 'penyelenggara' },
            { data: 'juara' },
            { data: 'dosen_pembimbing' },
            { data: 'achievement_program_studi' },
            { data: 'achievement_level' },
            { data: 'achievement_type' },
            { data: 'location' },
            { data: 'date' },
            {
                data: 'link_sertifikat',
                render: function (data) {
                    if (!data) return '-';

                    let safeUrl = data
                        .replace(/[“”]/g, '"')
                        .replace(/[‘’]/g, "'")
                        .replace(/&quot;/g, '"')
                        .replace(/javascript:/gi, '');

                    return `<a href="${safeUrl}" target="_blank" rel="noopener noreferrer">Lihat</a>`;
                }
            },

            {
                data: 'image',
                orderable: false,
                searchable: false
            },
            {
                name: 'is_publish',
                data: 'is_publish',
                mRender: function (data, type, row) {
                    return `
                        <div class="custom-control custom-switch switch-lg custom-switch-primary">
                            <input type="checkbox" class="custom-control-input toggle-status" id="switch-${row.hashid}" data-id="${row.hashid}" ${data == true ? 'checked' : ''}>
                            <label class="custom-control-label" for="switch-${row.hashid}">
                                <span class="switch-text-left">Aktif</span>
                                <span class="switch-text-right">Tidak Aktif</span>
                            </label>
                        </div>
                    `;
                }
            },
            {
                data: 'hashid',
                render: function (id) {
                    return `
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-warning btn-sm btn-edit" data-id="${id}" title="Edit">
                                <i class="feather icon-edit"></i>
                            </button>
                            <button class="btn btn-outline-danger btn-sm btn-delete" data-id="${id}" title="Hapus">
                                <i class="feather icon-trash-2"></i>
                            </button>
                        </div>
                    `;
                },
                orderable: false,
                searchable: false
            }
        ]
    });

    $('#addDataBtn').on('click', function () {
        $('#achievementForm')[0].reset();
        $('#achievementForm input[name=_method]').val('POST');
        $('#achievementModal').modal('show');
    });

    $('#achievementForm').on('submit', function (e) {
        e.preventDefault();

        let form = $(this)[0];
        let id = $('input[name="id"]').val();
        let method = $('input[name="_method"]').val();

        let formData = new FormData(form);
        formData.append('_method', method);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        let url = (method === 'PUT')
            ? `/apps/achievements/${id}/update`
            : `/apps/achievements/store`;

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                $('#achievementModal').modal('hide');
                table.ajax.reload();
                Swal.fire('Sukses', res.message, 'success');
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON?.errors;
                    let messages = Object.values(errors || {}).flat().join('<br>');
                    Swal.fire('Validasi Gagal', messages, 'error');
                } else {
                    Swal.fire('Gagal', 'Gagal menyimpan data.', 'error');
                }
                console.error(xhr);
            }
        });
    });

    $(document).on('click', '.btn-edit', function () {
        let id = $(this).data('id');

        $.get(`/apps/achievements/${id}/show`, function (res) {
            let data = res.data;

            $('#achievementForm input[name="id"]').val(id);
            $('#achievementForm input[name="_method"]').val('PUT');

            $('#achievementForm input[name="title"]').val(data.title);
            $('#achievementForm input[name="location"]').val(data.location);
            $('#achievementForm input[name="date"]').val(data.date);
            $('#achievementForm textarea[name="description"]').val(data.description);
            $('#achievementForm input[name="nim"]').val(data.nim);
            $('#achievementForm input[name="nama_mahasiswa"]').val(data.nama_mahasiswa);
            $('#achievementForm input[name="penyelenggara"]').val(data.penyelenggara);
            $('#achievementForm input[name="juara"]').val(data.juara);
            $('#achievementForm input[name="dosen_pembimbing"]').val(data.dosen_pembimbing);
            $('#achievementForm input[name="link_sertifikat"]').val(data.link_sertifikat);

            $('#achievementForm select[name="achievement_type_id"]').val(data.achievement_type_id);
            $('#achievementForm select[name="achievement_level_id"]').val(data.achievement_level_id);
            $('#achievementForm select[name="achievement_program_studi_id"]').val(data.achievement_program_studi_id);

            $('#achievementModal').modal('show');
        });
    });

    $('#dataTable').on('click', '.btn-delete', function () {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Hapus?',
            text: 'Data akan dihapus permanen!',
            icon: 'warning',
            showCancelButton: true
        }).then(result => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/apps/achievements/${id}/delete`,
                    method: 'DELETE',
                    data: { _token: $('meta[name="csrf-token"]').attr('content') },
                    success: res => {
                        table.ajax.reload();
                        Swal.fire('Berhasil', res.message, 'success');
                    },
                    error: () => {
                        Swal.fire('Gagal', 'Tidak bisa menghapus data', 'error');
                    }
                });
            }
        });
    });

    $(document).on('change', '.toggle-status', function () {
        const hashid = $(this).data('id');
        updateStatus(hashid);
    });

    async function updateStatus(hashid) {
        swal.fire({
            title: 'Processing',
            html: 'Sedang memperbarui data',
            allowOutsideClick: false,
            didOpen: () => {
                swal.showLoading()
            }
        });

        try {
            const res = await fetch(`${window.location.href}/${hashid}/update-status`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            swal.close();

            if (res.ok) {
                const data = await res.json();
                notify('success', data.message);
                if (typeof table !== 'undefined') table.ajax.reload(null, false);
            } else {
                const data = await res.json();
                notify('warning', data.message || 'Gagal memperbarui status');
            }
        } catch (err) {
            swal.close();
            notify('error', 'Terjadi kesalahan jaringan.');
            console.error(err);
        }
    }
});

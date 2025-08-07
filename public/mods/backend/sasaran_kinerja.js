$(document).ready(function () {
    // Setup CSRF token untuk semua request AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Inisialisasi DataTable langsung
    var table = $('#sasaranTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('#sasaranTable').data('url'),
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'kode', name: 'kode' },
            { data: 'nama', name: 'nama' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        order: [[1, 'asc']],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
        }
    });

    // Submit form (tambah atau edit)
    $('#sasaranForm').on('submit', function (e) {
        e.preventDefault();

        let form = $(this);
        let id = $('#id').val();
        let url = '/apps/sasaran_kinerjas';
        if (id) {
            url += '/' + id;
        }
        // Langsung pakai POST, cukup gunakan updateOrCreate di controller Laravel
        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(),
            success: function (response) {
                $('#sasaranModal').modal('hide');
                $('#sasaranForm')[0].reset(); // reset form
                table.ajax.reload(); // reload DataTable

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil disimpan.',
                    timer: 2000,
                    showConfirmButton: false
                });
            },
            error: function (xhr, status, error) {
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
    //     $.get('/apps/sasaran_kinerjas/kode-options', function (data) {
    //         const select = $('#kode');
    //         select.empty().append('<option value="">-- Pilih Kode --</option>');
    //         $.each(data, function (i, kode) {
    //             select.append(`<option value="${kode}" ${selected === kode ? 'selected' : ''}>${kode}</option>`);
    //         });
    //     });
    // }

    function generateNewCode() {
        const baseUrl = window.location.origin;
        fetch(`${baseUrl}/apps/sasaran_kinerjas/last_code`)
        .then(response => response.json())
        .then(data => {
            const lastKode = data.kode;
            document.getElementById('kode').value = lastKode;
        })
        .catch(error => {
            console.error('Gagal fetch kode baru:', error);
        });
    }



    // Fungsi tampilkan form (tambah / edit)
    window.showForm = function (id = null) {
        $('#sasaranForm')[0].reset();
        $('#id').val('');

        if (id) {
            $.get(`/apps/sasaran_kinerjas/${id}`, function (res) {
                $('#id').val(res.id);
                $('#kode').val(res.kode);
                $('#nama').val(res.nama); // <- pastikan ID-nya "nama"
                $('#sasaranModal').modal('show');
            });
        } else {
            generateNewCode();
            $('#sasaranModal').modal('show');
        }
    };

    // Fungsi hapus
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
                    url: `/apps/sasaran_kinerjas/${id}`,
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

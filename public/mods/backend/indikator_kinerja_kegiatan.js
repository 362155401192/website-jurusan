if (typeof table === 'undefined') {
    var table;
}

// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });


// Inisialisasi DataTable manual
table = $('#indikatorTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '/apps/indikator_kinerja_kegiatans/list',
        type: 'GET',
    },
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'sasaran', name: 'sasaran' },
        { data: 'kode', name: 'kode' },
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
    order: [[1, 'asc']],
    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
    }
});


window.showForm = function (id = null) {
    $('#indikatorForm')[0].reset();
    $('#id').val('');
    $('input[name="_method"]').val('POST');

    loadKodeOptions();

    if (id) {
        $.get(`/apps/indikator_kinerja_kegiatans/${id}`, function (res) {
            $('#id').val(res.id);
            $('#kode').val(res.kode);
            loadKodeOptions(res.kode);
            $('#deskripsi').val(res.deskripsi);
            $('#target_akhir').val(res.target_akhir);
            $('#realisasi_akhir').val(res.realisasi_akhir);
            $('#sasaran_kinerja_id').val(res.sasaran_kinerja_id);
            $('input[name="_method"]').val('PUT');
            $('#indikatorModal').modal('show');
        });
    } else {
        $('#indikatorModal').modal('show');
    }
};

$('#indikatorForm').on('submit', function (e) {
    e.preventDefault();

    let form = $(this);
    let id = $('#id').val(); // hidden input id
    let url = id
        ? `/apps/indikator_kinerja_kegiatans/${id}`
        : '/apps/indikator_kinerja_kegiatans';

    let formData = form.serialize();

    if (id) {
        formData += '&_method=PUT'; // Simulasi PUT karena kita tetap kirim dengan POST
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function () {
            $('#indikatorModal').modal('hide');
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
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan saat menyimpan data.',
            });
            console.error(xhr.responseText);
        }
    });
});

function loadKodeOptions(selected = null) {
    $.get('/apps/indikator_kinerja_kegiatans/kode-options', function (data) {
        const select = $('#kode');
        select.empty().append('<option value="">-- Pilih Kode --</option>');
        $.each(data, function (i, kode) {
            select.append(`<option value="${kode}" ${selected === kode ? 'selected' : ''}>${kode}</option>`);
        });
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
    $('input[name="_method"]').val('POST');
});

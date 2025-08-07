// Hindari deklarasi ulang
if (typeof targetTable === 'undefined') {
    var targetTable = null;
}

window.initTargetRealisasi = function () {
    // Pastikan table hanya diinisialisasi jika elemen ada
    const $table = $('#targetRealisasiTable');
    if (!$table.length) return;

    // Hancurkan DataTable lama jika ada
    if ($.fn.DataTable.isDataTable('#targetRealisasiTable')) {
        $table.DataTable().destroy();
    }

    // Ambil URL dari atribut data-url
    const ajaxUrl = $table.data('url') || '/apps/target_realisasis/list';

    var groupColumn = 1;

    targetTable = $table.DataTable({
        processing: true,
        serverSide: true,
        ajax: ajaxUrl,
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' }, // Sembunyikan indeks jika tidak perlu
            { data: 'sasaran', name: 'sasaran', visible: false }, // Sembunyikan kolom grouping
            { data: 'indikator', name: 'indikator' },
            { data: 'tw1_target', name: 'tw1_target' },
            { data: 'tw1_realisasi', name: 'tw1_realisasi' },
            { data: 'tw2_target', name: 'tw2_target' },
            { data: 'tw2_realisasi', name: 'tw2_realisasi' },
            { data: 'tw3_target', name: 'tw3_target' },
            { data: 'tw3_realisasi', name: 'tw3_realisasi' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
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
                        <td colspan="10">Sasaran Kinerja: ${group}</td>
                    </tr>`
                    );
                    last = group;
                }
            });
        },

    });

    // Bind ulang event form submit (hindari duplikat)
    $('#targetRealisasiForm').off('submit').on('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const $modal = $('#targetRealisasiModal');

        $.ajax({
            url: '/apps/target_realisasis',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                $modal.modal('hide');
                if (targetTable) targetTable.ajax.reload();
                Swal.fire('Berhasil', 'Data berhasil disimpan.', 'success');
            },
            error: function (xhr) {
                const res = xhr.responseJSON;
                Swal.fire('Error', res?.message || 'Gagal menyimpan data.', 'error');
            }
        });
    });

    // Reset form saat modal ditutup
    $('#targetRealisasiModal').off('hidden.bs.modal').on('hidden.bs.modal', function () {
        $('#targetRealisasiForm')[0].reset();
        $('#id').val('');
    });
};

// Show form (edit / create)
window.showForm = function (id = null) {
    $('#targetRealisasiForm')[0].reset();
    $('#id').val('');

    if (id) {
        $.get(`/apps/target_realisasis/${id}`, function (res) {
            $('#id').val(res.id);
            $('#indikator_kinerja_kegiatan_id').val(res.indikator_kinerja_kegiatan_id);
            $('[name="triwulan"]').val(res.triwulan);
            $('[name="target"]').val(res.target);
            $('[name="realisasi"]').val(res.realisasi);
            $('#targetRealisasiModal').modal('show');
        });
    } else {
        $('#targetRealisasiModal').modal('show');
    }
};

// Hapus data
window.deleteData = function (id) {
    Swal.fire({
        title: 'Hapus?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/apps/target_realisasis/${id}`,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function () {
                    if (targetTable) targetTable.ajax.reload();
                    Swal.fire('Berhasil', 'Data telah dihapus.', 'success');
                },
                error: function () {
                    Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus data.', 'error');
                }
            });
        }
    });
};

// Inisialisasi otomatis saat HTML dimuat via pushState
$(document).ready(function () {
    // Untuk initial load langsung (jika tidak pakai handleView)
    if ($('#targetRealisasiTable').length) {
        initTargetRealisasi();
    }
});

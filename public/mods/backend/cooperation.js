if (typeof table === 'undefined') {
    let table;
}

table = initTable('#dataTable', [{
        name: 'id',
        data: null,
        width: '1%',
        mRender: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }
    },
    {
        name: 'partner_s',
        data: 'partner_s',
    },
    {
        name: 'name',
        data: 'name',
    },
    {
        name: 'cooperation_type',
        data: 'cooperation_type',
    },
    {
        name: 'cooperation_field',
        data: 'cooperation_field',
    },
   
    {
        name: 'date_start',
        data: 'date_start',
        mRender: function (data) {
            if (data == null) {
                return '-';
            } else {
                // Konversi tanggal menjadi objek JavaScript Date
                var dateObj = new Date(data);
                // Ambil bulan dari tanggal (diindeks dari 0 hingga 11, jadi tambahkan 1)
                var month = dateObj.toLocaleString('default', { month: 'long' });
                // Ambil tanggal dan tambahkan nol di depan jika diperlukan
                var day = String(dateObj.getDate()).padStart(2, '0');
                // Format tanggal dengan bulan yang ditambahkan
                return day + ' ' + month + ' ' + dateObj.getFullYear();
            }
        }
    },
    {
        name: 'date_end',
        data: 'date_end',
         mRender: function (data) {
            if (data == null) {
                return '-';
            } else {
                // Konversi tanggal menjadi objek JavaScript Date
                var dateObj = new Date(data);
                // Ambil bulan dari tanggal (diindeks dari 0 hingga 11, jadi tambahkan 1)
                var month = dateObj.toLocaleString('default', { month: 'long' });
                // Ambil tanggal dan tambahkan nol di depan jika diperlukan
                var day = String(dateObj.getDate()).padStart(2, '0');
                // Format tanggal dengan bulan yang ditambahkan
                return day + ' ' + month + ' ' + dateObj.getFullYear();
            }
        }
    },
    {
        name: 'is_publish',
        data: 'is_publish',
        mRender: function (data, type, row) {
            return `
                <div class="custom-control custom-switch switch-lg custom-switch-primary">
                    <input type="checkbox" class="custom-control-input" id="${row.hashid}" ${data == true ? 'checked' : ''} onchange="updateStatus('${row.hashid}')">
                    <label class="custom-control-label" for="${row.hashid}">
                        <span class="switch-text-left">Aktif</span>
                        <span class="switch-text-right">Tidak Aktif</span>
                    </label>
                </div>
            `
        }
    },
    {
        name: 'id',
        data: 'hashid',
        width: 150,
        sortable: false,
        mRender: function (data, type, row) {
            var render = ``;

            if (userPermissions.includes('update-cooperations')) {
                render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editCooperation('${data}')"><i class="feather icon-edit"></i></button> `;
            }

            if (userPermissions.includes('delete-cooperations')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `;
            }

            return render;
        }
    }
]);

$('.add').on('click', function () {
    resetInvalid();
    $("#cooperationForm")[0].reset();
    $('#cooperationModal .modal-title').html('Tambah Kerjasama Industri');
    $('#cooperationModal form').attr('action', `${window.location.href}/store`);
});

function editCooperation(id) {
    $('#cooperationModal form').attr('action', `${window.location.href}/${id}/update`);
    $("#cooperationForm")[0].reset();
    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(data => {
            resetInvalid();
            $('#cooperationModal .modal-title').html('Edit Kerjasama Industri');
            $('#partner_s').val(data.partner_s);
            $('#name').val(data.data.name);
            $('#cooperation_type').val(data.cooperation_type);
            $('#cooperation_field').val(data.cooperation_field);
            $('#benefit').val(data.data.benefit);
            $('#date_start').val(data.data.date_start);
            $('#date_end').val(data.data.date_end);
            $('#cooperationModal').modal('show');
        });
}


async function updateStatus(hashid) {
    swal.fire({
        title: 'Porcessing',
        html: 'Sedang memperbarui data',
        allowOutsideClick: false,
        didOpen: () => {
            swal.showLoading()
        }
    })

    const res = await fetch(`${window.location.href}/${hashid}/update-status`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })

    swal.close()
    if (res.status == 200) {
        var data = await res.json()

        notify('success', data.message)

        if (typeof table != 'undefined') table.ajax.reload()
        else handleView()
    } else {
        if (res.status == 401) {
            window.location.assign()
        } else {
            var data = await res.json()
            notify('warning', data.message)
        }
    }
}

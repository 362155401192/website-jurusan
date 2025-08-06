if (typeof table == 'undefined') {
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
        name: "title",
        data: "title",
    },

    {
        name: "slug",
        data: "slug",
    },
    {
        name: "menu_page",
        data: "menu_page",
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
        width: 200,
        sortable: false,
        render: function (data, type, row) {
            var render = ``;

            if (userPermissions.includes('update-pages')) {
                render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editPage('${data}')"><i class="feather icon-edit"></i></button> `;
            }

            if (userPermissions.includes('delete-pages')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `;
            }

            // Tambahkan tombol "View" di sini
            render += `<a href="/${row.slug}" class="btn btn-outline-info btn-sm" target="_blank"><i class="feather icon-eye"></i></a> `;


            return render;
        }
    }

]);

$('.add').on('click', function () {
    resetInvalid();
    $("#pageForm")[0].reset();
    $('#pageModal .modal-title').html('Tambah Halaman');
    $('#pageModal form').attr('action', `${window.location.href}/store`);
    $('#pageModal').modal('show');
});

// function editPage(id) {
//     $('#pageModal form').attr('action', `${window.location.href}/${id}/update`);
//     $("#pageForm")[0].reset();
//     fetch(`${window.location.href}/${id}/show`)
//         .then(res => res.json())
//         .then(data => {
//             resetInvalid();
//             $('#pageModal .modal-title').html('Edit Halaman');
//             $('#title').val(data.data.title);
//             $('#content').val(data.data.content);
//             $('#slug').val(data.data.slug);
//             $('#pageModal').modal('show');
//         });
// }

function editPage(id) {
    $('#pageModal form').attr('action', `${window.location.href}/${id}/update`);
    $("#pageForm")[0].reset();
    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(data => {
            resetInvalid();
            $('#pageModal .modal-title').html('Edit Halaman');
            $('#title').val(data.data.title);
            $('#content').val(data.data.content);
            $('#slug').val(data.data.slug);
            $('#menu_page').val(data.data.menu_page);

            // Destroy existing CKEditor instance if exists
            if (CKEDITOR.instances['content']) {
                CKEDITOR.instances['content'].destroy(true);
            }

            // Set value and initialize CKEditor
            CKEDITOR.replace('content', {
                // CKEditor configuration options here, if needed
            });

            // Menyembunyikan notifikasi peringatan
            CKEDITOR.instances['content'].on('notificationShow', function(event) {
                if (event.data.message.indexOf('This CKEditor 4.22.1 version is not secure.') !== -1) {
                    event.cancel();
                }
            });

            $('#pageModal').modal('show');
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}


async function updateStatus(hashid) {
    swal.fire({
        title: 'Processing',
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

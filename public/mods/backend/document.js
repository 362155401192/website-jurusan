if (typeof table == 'undefined') {
    let table
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
        name: 'title',
        data: 'title',
    },
    {
        name: 'file',
        data: 'file',
        mRender: function (data, type, row) {
            return `<a href="${$('meta[name="base-url"]').attr('content')}/storage/documents/${data}" target="_blank" class="">
                    <div class="d-flex">
                        <div class="flex-shrink-0 mr-1">
                            <i class="feather icon-file-text"></i>
                        </div>
                        <div class="flex-grow-1">
                             File Dokumen
                        </div>
                    </div>
                </a>`
        }
    },
    {
        name: 'document_type',
        data: 'document_type',
    },
    {
        name: 'description',
        data: 'description',
        mRender: function (data) {
            return data == null ? '-' : data;
        }
    },
    {
        name: 'link',
        data: 'link',
        mRender: function (data) {
            return data == null ? '-' : `<a href="${data}" target="_blank">${data}</a>`
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
            var render = ``

            if (userPermissions.includes('update-documents')) {
                render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editDocument('${data}')"><i class="feather icon-edit"></i></button> `
            }

            if (userPermissions.includes('delete-documents')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            }

            return render
        }
    }
]);



$('.add').on('click', function () {
    resetInvalid();
    $("#documentForm")[0].reset()
    $('#documentModal .modal-title').html('Tambah Dokumen');
    $('#documentModal form').attr('action', `${window.location.href}/store`);
});

function editDocument(id) {
    $('#documentModal form').attr('action', `${window.location.href}/${id}/update`);
    $("#documentForm")[0].reset()
    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(data => {
            resetInvalid();
            $('#documentModal .modal-title').html('Edit Dokumen');
            $('#title').val(data.data.title);
            $('#document_type').val(data.document_type);
            $('#description').val(data.data.description);
            $('#link').val(data.data.link);
            $('#documentModal').modal('show');
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

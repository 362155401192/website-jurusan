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
        name: 'name',
        data: 'name',
        mRender: function (data, type, row) {
            return `
                <div class="row">
                    <div class="col-md-2">
                        <img class="round" src="${(row.profile_photo_path != null) ? $('meta[name="asset-url"]').attr('content') + `storage/images/users/${row.profile_photo_path}` : `https://ui-avatars.com/api/?name=${data}&&background=random`}" alt="avatar" height="40" width="40">
                    </div>
                    <div class="col-md-10">
                        <h6 class="m-0 p-0">${data}</h6>
                        <span class="text-muted small">${row.username}</span>
                    </div>
                </div>
            `
        }
    },
    {
        name: 'role',
        data: 'role',
    },
    {
        name: 'email',
        data: 'email',
    },
    {
        name: 'is_active',
        data: 'is_active',
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

            if (userPermissions.includes('update-users')) {
                render += `<button class="btn btn-outline-primary btn-sm" data-toggle="edit" data-id="${data}"><i class="feather icon-edit"></i></button> `
            }

            if (userPermissions.includes('delete-users')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            }

            return render
        }
    }
])

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

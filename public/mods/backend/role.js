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
    },
    {
        name: 'guard_name',
        data: 'guard_name',
    },
    {
        name: 'id',
        data: 'hashid',
        width: 180,
        sortable: false,
        mRender: function (data, type, row) {
            var render = ``
            if (userPermissions.includes('update-roles')) {
                render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editRole('${data}')"><i class="feather icon-edit"></i></button> `
            }

            if (userPermissions.includes('delete-roles')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            }

            if (userPermissions.includes('change-permissions')) {
                render += `<button class="btn btn-outline-secondary btn-sm" data-toggle="ajax" data-target="${$('meta[name="base-url"]').attr('content')}/apps/roles/${data}/change-permission"><i class="feather icon-shield"></i></button> `
            }

            return render
        }
    }
])

$('.add').on('click', function () {
    resetInvalid();
    $("#roleForm")[0].reset()
    $('#roleModal .modal-title').html('Tambah Role');
    $('#roleModal form').attr('action', `${window.location.href}/store`);
});

function editRole(id) {
    $('#roleModal form').attr('action', `${window.location.href}/${id}/update`);
    $("#roleForm")[0].reset()
    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(data => {
            resetInvalid();
            $('#roleModal .modal-title').html('Edit Role');
            $('#name').val(data.data.name);
            $('#roleModal').modal('show');
        });
}


$("#uid").click(function () {
    if (this.checked == true) {
        $(".uid").prop("checked", true);
    } else {
        $(".uid").prop("checked", false);
    }
});

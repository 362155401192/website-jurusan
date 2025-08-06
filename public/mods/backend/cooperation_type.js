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
        name: 'id',
        data: 'hashid',
        width: 150,
        sortable: false,
        mRender: function (data, type, row) {
            var render = ``

            if (userPermissions.includes('update-cooperation-types')) {
                render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editCooperationType('${data}')"><i class="feather icon-edit"></i></button> `
            }

            if (userPermissions.includes('delete-cooperation-types')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            }

            return render
        }
    }
]);



$('.add').on('click', function () {
    resetInvalid();
    $("#cooperationTypeForm")[0].reset()
    $('#cooperationTypeModal .modal-title').html('Tambah Jenis Kerjasama');
    $('#cooperationTypeModal form').attr('action', `${window.location.href}/store`);
});

function editCooperationType(id) {
    $('#cooperationTypeModal form').attr('action', `${window.location.href}/${id}/update`);
    $("#cooperationTypeForm")[0].reset()
    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(data => {
            resetInvalid();
            $('#cooperationTypeModal .modal-title').html('Edit Jenis Kerjasama');
            $('#name').val(data.data.name);
            $('#cooperationTypeModal').modal('show');
        });
}

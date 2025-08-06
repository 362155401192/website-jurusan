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

            if (userPermissions.includes('update-cooperation-fields')) {
                render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editCooperationField('${data}')"><i class="feather icon-edit"></i></button> `
            }

            if (userPermissions.includes('delete-cooperation-fields')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            }

            return render
        }
    }
]);



$('.add').on('click', function () {
    resetInvalid();
    $("#cooperationFieldForm")[0].reset()
    $('#cooperationFieldModal .modal-title').html('Tambah Bidang Kerjasama');
    $('#cooperationFieldModal form').attr('action', `${window.location.href}/store`);
});

function editCooperationField(id) {
    $('#cooperationFieldModal form').attr('action', `${window.location.href}/${id}/update`);
    $("#cooperationFieldForm")[0].reset()
    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(data => {
            resetInvalid();
            $('#cooperationFieldModal .modal-title').html('Edit Bidang Kerjasama');
            $('#name').val(data.data.name);
            $('#cooperationFieldModal').modal('show');
        });
}

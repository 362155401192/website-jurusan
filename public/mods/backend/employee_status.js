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

            if (userPermissions.includes('update-employee-statuses')) {
                render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editEmployeeStatus('${data}')"><i class="feather icon-edit"></i></button> `
            }

            if (userPermissions.includes('delete-employee-statuses')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            }

            return render
        }
    }
]);

$('.add').on('click', function () {
    resetInvalid();
    $("#employeeStatusForm")[0].reset()
    $('#employeeStatusModal .modal-title').html('Tambah Status Staff');
    $('#employeeStatusModal form').attr('action', `${window.location.href}/store`);
});

function editEmployeeStatus(id) {
    $('#employeeStatusModal form').attr('action', `${window.location.href}/${id}/update`);
    $("#employeeStatusForm")[0].reset()
    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(data => {
            resetInvalid();
            $('#employeeStatusModal .modal-title').html('Edit Status Staff');
            $('#name').val(data.data.name);
            $('#employeeStatusModal').modal('show');
        });
}

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
        name: "name",
        data: "name",
        mRender: function (data, type, row) {
            return `
                <div class="d-flex align-items-center">
                    <img class="round" src="${
                        row.image != null
                            ? `${
                                  $('meta[name="asset-url"]').attr("content") +
                                  `storage/images/employees/${row.image}`
                              }`
                            : `https://ui-avatars.com/api/?name=${data}&&background=random`
                    }" alt="avatar" height="40" width="40">
                    <div class="d-block ml-2">
                        <p class="m-0 p-0"><strong>${data}</strong></p>
                        <span><i class="feather icon-credit-card"></i> ${
                            row.identity_number
                        }</span>
                    </div>
                </div>
            `;
        },
    },
    {
        name: 'gender',
        data: 'gender',
        mRender: function (data) {
            return data == 'male' ? 'Laki-Laki' : 'Perempuan';
        }
    },
    {
        name: 'employee_type',
        data: 'employee_type',
    },

    {
        name: 'employee_status',
        data: 'employee_status',
    },
    {
        name: 'employee_program_studi',
        data: 'employee_program_studi',
    },
    {
        name: 'id',
        data: 'hashid',
        width: 150,
        sortable: false,
        mRender: function (data, type, row) {
            var render = ``

            if (userPermissions.includes('update-employees')) {
                render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editEmployee('${data}')"><i class="feather icon-edit"></i></button> `
            }

            if (userPermissions.includes('delete-employees')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            }

            return render
        }
    }
]);



$('.add').on('click', function () {
    resetInvalid();
    $("#employeeForm")[0].reset()
    $('#employeeModal .modal-title').html('Tambah Staff');
    $('#employeeModal form').attr('action', `${window.location.href}/store`);
});

function editEmployee(id) {
    $('#employeeModal form').attr('action', `${window.location.href}/${id}/update`);
    $("#employeeForm")[0].reset()
    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(data => {
            resetInvalid();
            $('#employeeModal .modal-title').html('Edit Staff');
            $('#name').val(data.data.name);
            $('#id_sdm').val(data.data.id_sdm);
            $('#gender').val(data.data.gender);
            $('#slug').val(data.data.slug);
            $('#employee_type').val(data.employee_type);
            $('#employee_status').val(data.employee_status);
            $('#identity_number').val(data.data.identity_number);
            $('#employeeModal').modal('show');
        });
}

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

            if (userPermissions.includes('update-document-types')) {
                render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editDocumentType('${data}')"><i class="feather icon-edit"></i></button> `
            }

            if (userPermissions.includes('delete-document-types')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            }

            return render
        }
    }
]);



$('.add').on('click', function () {
    resetInvalid();
    $("#documentTypeForm")[0].reset()
    $('#documentTypeModal .modal-title').html('Tambah Jenis Dokumen');
    $('#documentTypeModal form').attr('action', `${window.location.href}/store`);
});

function editDocumentType(id) {
    $('#documentTypeModal form').attr('action', `${window.location.href}/${id}/update`);
    $("#documentTypeForm")[0].reset()
    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(data => {
            resetInvalid();
            $('#documentTypeModal .modal-title').html('Edit Jenis Dokumen');
            $('#name').val(data.data.name);
            $('#documentTypeModal').modal('show');
        });
}

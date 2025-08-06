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

            if (userPermissions.includes('update-achievement-types')) {
                render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editAchievementType('${data}')"><i class="feather icon-edit"></i></button> `
            }

            if (userPermissions.includes('delete-achievement-types')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            }

            return render
        }
    }
]);



$('.add').on('click', function () {
    resetInvalid();
    $("#achievementTypeForm")[0].reset()
    $('#achievementTypeModal .modal-title').html('Tambah Jenis Prestasi');
    $('#achievementTypeModal form').attr('action', `${window.location.href}/store`);
});

function editAchievementType(id) {
    $('#achievementTypeModal form').attr('action', `${window.location.href}/${id}/update`);
    $("#achievementTypeForm")[0].reset()
    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(data => {
            resetInvalid();
            $('#achievementTypeModal .modal-title').html('Edit Jenis Prestasi');
            $('#name').val(data.data.name);
            $('#achievementTypeModal').modal('show');
        });
}

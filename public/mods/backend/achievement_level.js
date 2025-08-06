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

            if (userPermissions.includes('update-achievement-levels')) {
                render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editAchievementLevel('${data}')"><i class="feather icon-edit"></i></button> `
            }

            if (userPermissions.includes('delete-achievement-levels')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            }

            return render
        }
    }
]);



$('.add').on('click', function () {
    resetInvalid();
    $("#achievementLevelForm")[0].reset()
    $('#achievementLevelModal .modal-title').html('Tambah Tingkat Prestasi');
    $('#achievementLevelModal form').attr('action', `${window.location.href}/store`);
});

function editAchievementLevel(id) {
    $('#achievementLevelModal form').attr('action', `${window.location.href}/${id}/update`);
    $("#achievementLevelForm")[0].reset()
    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(data => {
            resetInvalid();
            $('#achievementLevelModal .modal-title').html('Edit Tingkat Prestasi');
            $('#name').val(data.data.name);
            $('#achievementLevelModal').modal('show');
        });
}

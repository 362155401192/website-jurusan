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
                                  `storage/images/partner/${row.image}`
                              }`
                            : `https://ui-avatars.com/api/?name=${data}&&background=random`
                    }" alt="avatar" height="30" width="35">
                    <div class="d-block ml-2">
                        <p class="m-0 p-0"><strong>${data}</strong></p>
                        <span><i class="feather icon-phone"></i> ${
                            row.phone_number
                        }</span>
                    </div>
                </div>
            `;
        },
    },
    {
        name: 'email',
        data: 'email',
    },
    {
        name: 'address',
        data: 'address',
    },
    {
        name: 'id',
        data: 'hashid',
        width: 150,
        sortable: false,
        mRender: function (data, type, row) {
            var render = ``

            if (userPermissions.includes('update-partners')) { // Ubah dari update-cooperation-types ke update-partners
                render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editPartner('${data}')"><i class="feather icon-edit"></i></button> ` // Ubah dari editCooperationType ke editPartner
            }

            if (userPermissions.includes('delete-partners')) { // Ubah dari delete-cooperation-types ke delete-partners
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> ` // Ubah dari deleteCooperationType ke deletePartner
            }

            return render
        }
    }
]);

$('.add').on('click', function () {
    resetInvalid();
    $("#partnerForm")[0].reset() // Ubah dari cooperationTypeForm ke partnerForm
    $('#partnerModal .modal-title').html('Tambah Partner'); // Ubah dari cooperationTypeModal ke partnerModal
    $('#partnerModal form').attr('action', `${window.location.href}/store`);
});

function editPartner(id) { // Ubah dari editCooperationType ke editPartner
    $('#partnerModal form').attr('action', `${window.location.href}/${id}/update`);
    $("#partnerForm")[0].reset() // Ubah dari cooperationTypeForm ke partnerForm
    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(data => {
            resetInvalid();
            $('#partnerModal .modal-title').html('Edit Partner'); // Ubah dari cooperationTypeModal ke partnerModal
            $('#name').val(data.data.name);
            $('#phone_number').val(data.data.phone_number);
            $('#email').val(data.data.email);
            $('#address').val(data.data.address);
            $('#partnerModal').modal('show'); // Ubah dari cooperationTypeModal ke partnerModal
        });
}

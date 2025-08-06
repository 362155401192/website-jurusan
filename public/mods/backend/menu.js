// if (typeof table == 'undefined') {
//     let table;
// }


// table = initTable('#dataTable', [{
//         name: 'id',
//         data: null,
//         width: '1%',
//         mRender: function (data, type, row, meta) {
//             return meta.row + meta.settings._iDisplayStart + 1;
//         }
//     },
//     {
//         name: "name",
//         data: "name",
//         render: function(data, type, row) {
//             // Check if the menu is a parent and has a level
//             if (row.is_parent && row.level) {
//                 // Jika punya is_parent dan level, tambahkan efek bold
//                 return `<b>${data}</b>`;
//             } else if (data === 'Beranda' || data === 'Dokumen') {
//                 // Jika nama menu adalah 'Beranda' atau 'Dokumen', tambahkan efek bold
//                 return `<b>${data}</b>`;
//             } else {
//                 // Jika parent selain 0, tambahkan margin kiri 20px
//                 if (row.parent !== 0) {
//                     return `<div style="margin-left: 20px;">${data}</div>`;
//                 } else {
//                     return data;
//                 }
//             }
//         }
//     },


//     {
//         name: "link",
//         data: "link",
//         render: function(data, type, row) {
//             // Ganti "pages" dengan URL tujuan Anda
//             var url = '/' + data;
//             // Membuat hyperlink dengan kelas "text-warning" dan URL yang ditentukan
//             return '<a href="' + url + '" class="text-warning">' + data + '</a>';
//         }
//     },



//     {
//         name: "link_target",
//         data: "link_target",
//     },

//     {
//         name: 'is_active',
//         data: 'is_active',
//         mRender: function (data, type, row) {
//             return `
//                 <div class="custom-control custom-switch switch-lg custom-switch-primary">
//                     <input type="checkbox" class="custom-control-input" id="${row.hashid}" ${data == true ? 'checked' : ''} onchange="updateStatus('${row.hashid}')">
//                     <label class="custom-control-label" for="${row.hashid}">
//                         <span class="switch-text-left">Aktif</span>
//                         <span class="switch-text-right">Tidak Aktif</span>
//                     </label>
//                 </div>
//             `
//         }
//     },
//     {
//         name: 'id',
//         data: 'hashid',
//         width: 150,
//         sortable: false,
//         render: function (data, type, row) {
//             var render = ``;

//             if (userPermissions.includes('update-menus')) {
//                 render += `<button class="btn btn-outline-primary btn-sm" type="button" onclick="editMenu('${data}')"><i class="feather icon-edit"></i></button> `;
//             }

//             if (userPermissions.includes('delete-menus')) {
//                 render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `;
//             }

//             return render;
//         }
//     }
// ]);

$('.add').on('click', function () {
    resetInvalid();
    $("#menuForm")[0].reset();
    $('#menuModal .modal-title').html('Tambah Menu');
    $('#menuModal form').attr('action', `${window.location.href}/store`);
});

function editMenu(id) {
    $('#menuModal form').attr('action', `${window.location.href}/${id}/update`);
    $("#menuForm")[0].reset();
    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(data => {
            resetInvalid();
            $('#menuModal .modal-title').html('Edit Menu');
            $('#name').val(data.data.name);
            $('#link').val(data.data.link);
            $('#level').val(data.data.level);
            $('#is_parent').val(data.data.is_parent);
            $('#parent').val(data.data.parent);
            $('#order').val(data.data.order);
            $('#link_target').val(data.data.link_target);
            $('#menuModal').modal('show');
        });
}

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




// async function updateStatus(hashid) {
//     swal.fire({
//         title: 'Porcessing',
//         html: 'Sedang memperbarui data',
//         allowOutsideClick: false,
//         didOpen: () => {
//             swal.showLoading()
//         }
//     })

//     const res = await fetch(`${window.location.href}/${hashid}/update-status`, {
//         headers: {
//             'X-Requested-With': 'XMLHttpRequest'
//         }
//     })

//     swal.close()
//     if (res.status == 200) {
//         var data = await res.json()

//         notify('success', data.message)

//         if (typeof table != 'undefined') table.ajax.reload()
//         else handleView()
//     } else {
//         if (res.status == 401) {
//             window.location.assign()
//         } else {
//             var data = await res.json()
//             notify('warning', data.message)
//         }
//     }
// }

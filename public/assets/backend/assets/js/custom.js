$(function () {
    window.userPermissions = [];

    // sidebarIndicatorActive()

    if ($('meta[name="user-permissions"]').length) {
        window.userPermissions = $('meta[name="user-permissions"]')
            .attr("content")
            .split(",");
    }

    window.onpopstate = function () {
        handleView();
    };

    if ($("v-content-rendering").length) {
        handleView();
    } else {
        handleEvent();
    }
});

const handleView = async () => {
    sidebarIndicatorActive();

    swal.fire({
        title: "Processing",
        html: "Sedang mengambil data",
        allowOutsideClick: false,
        didOpen: () => {
            swal.showLoading();
        },
    });

    $("v-content-rendering").removeClass("fade-animation");
    const res = await fetchRes(window.location.href);

    swal.close();
    if (res.status == 200) {
        var data = await res.response.text();
        $("v-content-rendering").html(data);
        $("v-content-rendering").addClass("fade-animation");
        $(".select2").select2();

        handleEvent();
    } else {
        if (res.status == 401 || res.status == 404) {
            window.location.reload();
        } else {
            var data = await res.response.json();
            notify("warning", data.message);
        }
    }
};

const pushState = (url) => {
    history.pushState([], null, url);

    $(".navigation").find(".active").removeClass("active");

    handleView();
};

const fetchRes = async (url) => {
    const res = await fetch(url, {
        headers: {
            "X-Requested-With": "XMLHttpRequest",
        },
    });

    return {
        status: await res.status,
        response: res,
    };
};

const handleEvent = () => {
    $('a[data-toggle="ajax"]')
        .unbind()
        .on("click", function (e) {
            e.preventDefault();

            $(".navigation")
                .find(`a[href="${$(this).attr("href")}"]`)
                .parent()
                .addClass("active");

            pushState($(this).attr("href"));
        });

    $('button[data-toggle="ajax"]')
        .unbind()
        .on("click", function (e) {
            e.preventDefault();

            $(".navigation")
                .find(`button[data-target="${$(this).attr("href")}"]`)
                .parent()
                .addClass("active");

            pushState($(this).data("target"));
        });

    $('a[data-toggle="logout"]')
        .unbind()
        .on("click", function (e) {
            e.preventDefault();
            swal.fire({
                tilte: "Logout?",
                icon: "question",
                text: "Yakin ingin keluar?",
                showConfirmButton: true,
                confirmButtonText: "Ya, keluar",
                confirmButtonColor: "#F2BF32",
                showCancelButton: true,
                cancelButtonText: "Batal",
            }).then((res) => {
                if (res.isConfirmed) {
                    $($(this).data("form")).submit();
                }
            });
        });

    $('button[data-toggle="edit"]')
        .unbind()
        .on("click", function (e) {
            e.preventDefault();
            pushState(`${window.location.href}/${$(this).data("id")}/edit`);
        });

    $('button[data-toggle="delete"]')
        .unbind()
        .on("click", function (e) {
            e.preventDefault();
            deleteConfirmation(this);
        });

    $('form[data-request="ajax"]')
        .unbind()
        .on("submit", async function (e) {
            e.preventDefault();
            var oldButtonText = $(this).find('button[type="submit"]').html();
            $(this)
                .find('button[type="submit"]')
                .html("Loading...")
                .attr("disabled", "disabled");
            resetInvalid();

            const res = await fetchFormRequest(this);

            $(this)
                .find('button[type="submit"]')
                .html(oldButtonText)
                .removeAttr("disabled");
            $(".waves-ripple").remove();

            if (res.status == 200) {
                $(".modal").modal("hide");
                $(".modal-backdrop").remove();
                $("body").removeClass("modal-open");

                var contentType = await res.response.headers.get(
                    "content-type"
                );

                if (
                    contentType &&
                    contentType.indexOf("application/json") !== -1
                ) {
                    var data = await res.response.json();
                    notify("success", data.message);
                } else {
                    notify("success", "Success");
                }

                if ($(this).data("redirect")) {
                    window.location.assign($(this).data("success-callback"));
                } else {
                    pushState($(this).data("success-callback"));
                }
            } else {
                if (res.status == 422) {
                    var data = await res.response.json();
                    showInvalid(data.errors);
                } else {
                    if (res.status == 302) {
                        notify("success", "Login Berhasil...");
                        if ($(this).data("redirect"))
                            window.location.assign(
                                $(this).data("success-callback")
                            );
                    } else if (res.status == 500) {
                        var data = await res.response.json();
                        notify("warning", data.message);
                    } else {
                        notify("success", "Success");
                    }

                    // if ($(this).data("redirect")) {
                    //     window.location.assign(
                    //         $(this).data("success-callback")
                    //     );
                    // } else {
                    //     pushState($(this).data("success-callback"));
                    // }
                }
            }
        });
};

const deleteConfirmation = (el) => {
    swal.fire({
        title: "Hapus ?",
        icon: "warning",
        text: "Data yang dihapus tidak dapat dikembalikan",
        showConfirmButton: true,
        confirmButtonText: "Ya, hapus",
        confirmButtonColor: "#F2BF32",
        showCancelButton: true,
        cancelButtonText: "Batal",
    }).then(async (rs) => {
        if (rs.isConfirmed) {
            swal.fire({
                title: "Please Wait",
                html: "Processing...",
                allowOutsideClick: false,
                didOpen: () => {
                    swal.showLoading();
                },
            });

            const res = await fetch(
                `${window.location.href}/${$(el).data("id")}/delete`, {
                    method: "delete",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                        "X-Requested-With": "XMLHttpRequest",
                        Accept: "application/json",
                    },
                }
            );

            swal.close();
            if (res.status == 200) {
                var data = await res.json();
                notify("success", data.message);

                if (typeof table == "undefined") handleView();
                else table.ajax.reload();
            } else {
                if (res.status == 401) {
                    window.location.reload();
                } else {
                    var data = await res.json();
                    notify("warning", data.message);
                }
            }
        }
    });
};

const fetchFormRequest = async (form) => {
    const res = await fetch($(form).attr("action"), {
        method: $(form).attr("method"),
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            "X-Requested-With": "XMLHttpRequest",
        },
        body: generateFormBody(new FormData(form)),
    });

    if (res.status == 404) {
        return {
            status: await res.status,
        };
    } else {
        return {
            status: await res.status,
            response: res,
        };
    }
};

const generateFormBody = (formData) => {
    const fd = new FormData();
    formData.forEach((val, key) => {
        fd.append(key, val);
    });

    return fd;
};

const showInvalid = (errorMessages) => {
    for (errorField in errorMessages) {
        $(
            `<div class="invalid-feedback">${errorMessages[errorField]}</div>`
        ).insertAfter(`.form-control[name="${errorField}"]`);
        $(`.form-control[name="${errorField}"]`).addClass("is-invalid");
    }
};

const resetInvalid = () => {
    for (const el of $(".form-control")) {
        $(el).removeClass("is-invalid");
        $(el).siblings(".invalid-feedback").remove();
        $(".invalid-feedback").remove();
    }
};

const notify = (type, message) => {
    var title;
    if (type == "success") title = "Success";
    else if (type == "danger") title = "Failed";
    else title = "Warning";

    return $.notify({
        title: `<strong><b>${title}</b></strong>`,
        message: `<br>${message}`,
        icon: "fa fa-check-circle",
    }, {
        type: type,
        allow_dismiss: false,
        newest_on_top: true,
        mouse_over: true,
        showProgressbar: false,
        spacing: 10,
        timer: 2000,
        placement: {
            from: "top",
            align: "right",
        },
        offset: {
            x: 30,
            y: 30,
        },
        delay: 1500,
        z_index: 10000,
        animate: {
            enter: "animated fadeIn",
            exit: "animated fadeOut",
        },
        onClose: null,
        onClosed: null,
    });
};

const initTable = (
    el,
    columnDefs = [],
    drawCallback = null,
    defaultOrder = [1, "desc"],
    selectable = false
) => {
    if (!$.fn.DataTable.isDataTable(el)) {

    }
    var config = {
        serverSide: true,
        processing: true,
        ajax: $(el).data("url"),
        columns: columnDefs,
        responsive: true,
        drawCallback,
    };

    if (defaultOrder) {
        config.order = defaultOrder
    }

    if (selectable) {
        config.select = {
            style: 'multi',
            selector: '.dt-checkboxes-cell, .dt-checkboxes'
        };

        config.columnDefs = [{
            targets: 1,
            checkboxes: {
                selectRow: true
            },
        }, ];
    }

    var table = $(el).DataTable(config)

    table.on("draw.dt", function () {
        handleEvent();
        dataTablesCheckbockEvent()
    });

    table.on("responsive-display", function () {
        handleEvent();
        dataTablesCheckbockEvent()
        drawCallback;
    });

    const dataTablesCheckbockEvent = () => {
        $('.dt-checkboxes-select-all').click(function () {
            if ($(this).find('input[type="checkbox"]:checked').length) {
                table.rows().select();
            } else {
                table.rows().deselect();
            }
        })
    }

    return table;
};


// const initTable = (
//     el,
//     columnDefs = [],
//     drawCallback = null,
//     defaultOrder = [1, "desc"],
//     selecttable = false
// ) => {
//     if (!$.fn.DataTable.isDataTable(el)) {

//     }
//     var configuration = {
//         serverSide: true,
//         processing: true,
//         ajax: $(el).data("url"),
//         columns: columnDefs,
//         responsive: true,
//         drawCallback,
//     };

//     if (selecttable) {
//         configuration.columnDefs = [{
//             targets: 1,
//             className: 'select-checkbox',
//             checkboxes: {
//                 selectRow: true
//             }
//         }];
//         configuration.select = {
//             style: 'multi',
//             selector: 'td:nth-child(2)'
//         };
//         configuration.buttons = [{
//                 text: 'Pilih Semua',
//                 action: function () {
//                     table.rows().select();
//                 }
//             },
//             {
//                 text: 'Batal',
//                 action: function () {
//                     table.rows().deselect();
//                 }
//             }
//         ];
//         configuration.dom = 'Bfrtip';
//     }

//     if (defaultOrder) {
//         configuration.order = defaultOrder;
//     }

//     const table = $(el).DataTable(configuration);

//     table.on("draw.dt", function () {
//         handleEvent();
//     });

//     table.on("responsive-display", function () {
//         handleEvent();
//         drawCallback;
//     });

//     return table;
// };

const sidebarIndicatorActive = () => {
    var controller = window.location.href.split("/")[4];
    $(".navigation")
        .find(
            `a[href="${$('meta[name="base-url"]').attr(
                "content"
            )}/apps/${controller}"]`
        )
        .parent()
        .addClass("active");

    $(".navigation")
        .find(
            `a[href="${$('meta[name="base-url"]').attr(
                "content"
            )}/apps/${controller}"]`
        )
        .parent()
        .addClass("active");

    $(".navigation")
        .find(".sidebar-group-active")
        .removeClass("sidebar-group-active");

    if (
        $(".navigation")
        .find(
            `a[href="${$('meta[name="base-url"]').attr(
                    "content"
                )}/apps/${controller}"]`
        )
        .parent()
        .parent()
        .parent()
        .hasClass("nav-item has-sub")
    ) {
        $(".navigation")
            .find(
                `a[href="${$('meta[name="base-url"]').attr(
                    "content"
                )}/apps/${controller}"]`
            )
            .parent()
            .parent()
            .parent()
            .addClass("sidebar-group-active");
    }
};

function numberFormat(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

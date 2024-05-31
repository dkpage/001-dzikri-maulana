// THEME COLOR

themeColor = {
    primary: "#0857f5",
    success: "#22ca80",
    danger: "#ff4f70",
    warning: "#fdc16a",
};

// ajax header xcsrf
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// SELECT2 INIT
$(".select2").select2({
    theme: "bootstrap-5",
    placeholder: "Pilih",
});

// DATATABLE INIT
function dataTableInit(tableId) {
    new DataTable(tableId, {
        layout: {
            topStart: {
                buttons: ["copy", "excel", "pdf", "colvis"],
            },
        },
    });
}

// SHOW ALERT TOASTIFY
function showToastify(type, text) {
    let bgColor;
    let icon;
    switch (type) {
        case "success":
            icon = "fi fi-rr-check-circle";
            bgColor = "#22ca80";
            break;
        case "warning":
            icon = "fi fi-rr-triangle-warning";
            bgColor = "#fdc16a";
            break;
        case "error":
            icon = "fi fi-rr-cross-circle";
            bgColor = "#ff4f70";
            break;
        case "info":
            icon = "fi fi-rr-info";
            bgColor = "linear-gradient(to right, #0857f5, #4708f5)";
            break;
    }

    Toastify({
        text: text,
        className: type,
        close: true,
        avatar: icon,
        // duration: 1000000,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        style: {
            background: bgColor,
        },
    }).showToast();
}

// SHOW ALERT SWEETALERT
function confirmDel(id, name, url) {
    Swal.fire({
        title: "Hapus?",
        text: "Yakin akan menghapus data " + name + "?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Hapus",
    }).then((result) => {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: id,
            },
            success: function (result) {
                if (result[0].message == "success") {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Data " + name + " berhasil dihapus",
                        icon: "success",
                    });
                }
            },
            dataType: dataType,
        });
        // if (result.isConfirmed) {
        //     Swal.fire({
        //         title: "Berhasil!",
        //         text: "Data " + name + " berhasil dihapus",
        //         icon: "success",
        //     });
        // }
    });
}

// SHOW LOADING DATA
function showLoading(state) {
    $(state).html(
        "<div class='loading-ajax'><i class='fi fi-rr-refresh me-3'></i> <span>Mengambil data...</span></div>"
    );
}

// GET TABLE
// getTable(elementYangDiisiTabel, urlController, idTabel, dataTable?)
function getTable(element, url, tableId, datatable = false) {
    showLoading(element);
    $.post(url, {}, function (data) {
        setTimeout(function () {
            $(element).html(data);
            if (datatable) {
                dataTableInit(tableId);
            }
        }, 500);
    });
}

// GET DROPDOWN DATA
// get role data
function getRole(url, field) {
    var selectEl = $("select[name=" + field + "]");
    $.ajax({
        type: "POST",
        url: url,
        data: {},
        success: function (result) {
            // return result;
            var newOpt = new Option(result.role_name, result.id, false, false);
            selectEl.append(newOpt).trigger("change");
        },
        error: function (errors) {
            for (const [key, value] of Object.entries(
                errors.responseJSON.errors
            )) {
                showToastify("error", `${value}`);
            }
        },
        dataType: "json",
    });
}

// INVALID FORM ACTION
function invalidInit() {
    $(".is-invalid").on("change", function () {
        $(this).siblings("label").removeClass("text-danger");
        $(this).removeClass("is-invalid");
    });
}

function resetInvalid() {
    $(".is-invalid").siblings("label").removeClass("text-danger");
    $(".is-invalid").removeClass("is-invalid");
}

// IMAGE EDIT STATE
$(function () {
    var imgHoveredDisplay =
        "<div class='img-hov-overlay'>" +
        "<i class='fi fi-rr-pen-circle'></i>" +
        "<span>Ubah</span>" +
        "</div>";
    $(".image-edit-state").append(imgHoveredDisplay);
});

// PREVIEW IMAGE WHEN UPLOAD
$(function () {
    $("input[type=file]").change(function (event) {
        var inputID = $(this).attr("id");
        var imgEl = $("img[data-src=" + inputID + "]");
        var reader = new FileReader();
        reader.onload = function (e) {
            $(imgEl).attr("src", e.target.result);
            $(imgEl).show();
        };
        reader.readAsDataURL(event.target.files[0]);
    });
});

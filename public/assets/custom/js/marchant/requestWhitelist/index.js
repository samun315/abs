let selectedForm = $("#submitForm");

// Get the current URL of the window
const BASE_URL = window.location.origin + "/marchant/request";

let search = $("#search");

let validate = selectedForm.validate({
    rules: {
        name: "required",
    },
    onsubmit: true,
});

$(".formReset").on("click", function () {
    formReset();
});

function formReset() {
    $("#submitForm").trigger("reset");
}

$("#openWhitelistModal").on("click", function () {
    openModal();
});

function openModal() {
    formReset();
    loader(selectedForm, false);
    $("#kt_whitelist_request_id").val(null);
    $("#showModal").modal("show");
}

selectedForm.submit(function (event) {
    event.preventDefault();

    if (!validate.valid()) return;

    loader(selectedForm, true);

    let formData = new FormData($("form#submitForm")[0]);

    // Setup CSRF token
    setCSRFToken();

    $(".error").remove();

    let whitelistId = $("#kt_whitelist_request_id").val();
    let url = "";
    if (whitelistId) {
        url = BASE_URL + "/whitelist/update/" + whitelistId;
        formData.append("_method", "PUT");
    } else {
        url = BASE_URL + "/whitelist/store";
    }

    $.ajax({
        url: url,
        data: formData,
        type: "POST", // Always use POST for FormData, append _method for PUT
        cache: false,
        contentType: false,
        processData: false,
        success: handleSuccessWithModal,
        error: handleError,
    });
});

const formatDate = (data) => {
    if (!data) return "";

    const date = new Date(data);
    // Month and day as textual representations
    let monthNames = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
    ];

    let month = monthNames[date.getMonth()];
    let day = date.getDate().toString().padStart(2, "0");
    let hour = date.getHours().toString().padStart(2, "0");

    let amPm = hour >= 12 ? "PM" : "AM";
    hour = hour % 12 || 12; // Convert 0 to 12 for 12 AM

    let minute = date.getMinutes().toString().padStart(2, "0");
    let second = date.getSeconds().toString().padStart(2, "0");

    return `${day} ${month}, ${date.getFullYear()} ,${hour}:${minute} ${amPm}`;
};

let table = $("#kt_table_whitelist").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: BASE_URL + "/whitelist",
        data: function (d) {
            d.search = search.val();
        },
    },
    columns: [
        {
            data: "DT_RowIndex",
            name: "DT_RowIndex",
            orderable: false,
            searchable: false,
        },
        {
            data: "mobile_number",
            name: "mobile_number",
        },
        {
            data: "status",
            render: function (data) {
                if (!data) return "";

                let status = "";

                if (data == "Pending") {
                    status = "badge badge-warning";
                } else if (data == "Active") {
                    status = "badge badge-success";
                } else {
                    status = "badge badge-danger";
                }

                return `<p class="${status} ">${data}</p>`;
            },
        },
        {
            data: "created_at",
            render: formatDate,
        },
    ],
    columnDefs: [
        {
            targets: "_all",
            defaultContent: "",
        },
    ],
    paging: true, // Enables pagination
    pageLength: 10, // Show 5 records per page
    lengthMenu: [10, 25, 50, 75, 100, 200], // Dropdown for selecting number of rows
    dom:
        '<"row"<"col-sm-2"l><"col-sm-10 d-flex justify-content-end"B>>' + // Length menu & buttons
        '<"row"<"col-sm-12"tr>>' + // Table rows
        '<"row mt-2"<"col-sm-6"i><"col-sm-6 d-flex justify-content-end"p>>', // Pagination & info
    buttons: [
        {
            extend: "excelHtml5",
            text: "Excel",
            className: "btn btn-success btn-sm",
            attr: {
                style: "margin-top: 25px;padding: 0 10px; font-size: 12px; line-height: 1; height: 30px;",
            },
            exportOptions: {
                columns: ":not(:first-child)", // Exclude the first column (DT_RowIndex)
            },
        },
        {
            extend: "pdfHtml5",
            text: "PDF",
            className: "btn btn-danger btn-sm",
            attr: {
                style: "margin-top: 25px;padding: 0 10px; font-size: 12px; line-height: 1; height: 30px;",
            },
            exportOptions: {
                columns: ":not(:first-child)", // Exclude the first column (DT_RowIndex)
            },
        },
    ],
});

search.keyup(function () {
    table.draw();
});

$(document).on("click", ".edit-user, .view-user", function () {
    var user_id = $(this).attr("data-id");
    editUserInfo(user_id);
});

function editUserInfo(userId) {
    loader(selectedForm, true);
    $(".error").remove();

    $.ajax({
        url: BASE_URL + "/edit/" + userId,
        type: "GET",
        success: function (response) {
            loader(selectedForm, false);
            const data = response.userInfo;
            // console.log(data.item);
            if (response?.success && response?.statusCode === 200 && data) {
                $("#kt_user_id").val(data.id);
                $("#kt_role_id").val(data.role_id).change();
                $("#kt_full_name").val(data.full_name);
                $("#kt_email").val(data.email);
                $("#kt_phone").val(data.phone);
                $("#kt_user_name").val(data.user_name);
                $("#kt_address").val(data.address);
                $("#kt_country").val(data.country);
                $("#kt_nid").val(data.nid);
                $("#kt_diamond_per_usd").val(data.diamond_per_usd);
                $("#kt_active").val(data.active).change();

                $(".password").hide();
                $(".modal-title").text("Edit User");
                $(".btnSubmit").text("Update");
            }
        },
    });
}

$(document).on("click", ".changePasswordBtn", function () {
    var id = $(this).attr("data-id");
    $(".password").show();
    $("#kt_user_id_for_password").val(id);
});

selectedPasswordForm.submit(function (event) {
    event.preventDefault();

    if (!validatePassword.valid()) return;

    loader(selectedPasswordForm, true);

    let passwordData = new FormData($("form#passwordChangeForm")[0]);

    // Setup CSRF token
    setCSRFToken();

    $(".error").remove();

    let userPassId = $("#kt_user_id_for_password").val();
    let url = "";
    if (userPassId) {
        url = BASE_URL + "/reset-password/" + userPassId;
        passwordData.append("_method", "PUT");
    }

    $.ajax({
        url: url,
        data: passwordData,
        type: "POST", // Always use POST for FormData, append _method for PUT
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response?.statusCode === 200 || response?.statusCode === 201) {
                $("#kt_modal_change_password").modal("hide");
                toastr.success(response?.message);
                table.draw();
            }
        },
        error: handleError,
    });
});

// Generic function to toggle password visibility and icon
function togglePasswordVisibility(buttonSelector, fieldSelector, iconSelector) {
    $(buttonSelector).on("click", function () {
        const passwordField = $(fieldSelector);
        const icon = $(iconSelector);

        if (passwordField.attr("type") === "password") {
            passwordField.attr("type", "text");
            icon.removeClass("fas fa-eye").addClass("fa fa-eye-slash");
        } else {
            passwordField.attr("type", "password");
            icon.removeClass("fa fa-eye-slash").addClass("fas fa-eye");
        }
    });
}

// Initial setup of icons
$(".passwordIcon").addClass("fas fa-eye");

// Apply function to each button and field
togglePasswordVisibility(".togglePasswordBtn", ".kt_password", ".passwordIcon");

$(".kt_password").on("keyup", function () {
    if ($(this).val() == "") {
        $(".togglePasswordBtn").hide();
    } else {
        $(".togglePasswordBtn").show();
    }
});

$(document).ready(function() {
    $("#kt_role_id").select2({
        placeholder: "Select Role",
        allowClear: true
    });
});

let selectedForm = $("#submitForm");
// Get the current URL of the window
const BASE_URL = window.location.origin+"/users";

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
    $("#kt_role_id").val('').change();
    $("#kt_active").val('YES').change();
}

$("#openUserModal").on("click", function () {
    openModal();
});

function openModal() {
    formReset();
    loader(selectedForm, false);
    $("#kt_user_id").val(null);
    $("#showModal").modal("show");
    $(".modal-title").text("Add New User");
    $(".btnSubmit").text("Add");
}

selectedForm.submit(function (event) {
    event.preventDefault();

    if (!validate.valid()) return;

    loader(selectedForm, true);

    let formData = new FormData($('form#submitForm')[0]);

    // Setup CSRF token
    setCSRFToken();

    $(".error").remove();

    let userId = $("#kt_user_id").val();
    let url = "";
    if (userId) {
        url = BASE_URL + "/update/" + userId;
        formData.append('_method', 'PUT');
    } else {
        url = BASE_URL + "/store";
    }

    $.ajax({
        url: url,
        data: formData,
        type: "POST",  // Always use POST for FormData, append _method for PUT
        cache: false,
        contentType: false,
        processData: false,
        success: handleSuccessWithModal,
        error: handleError,
    });
});

let table = $('#kt_table_users').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: BASE_URL+"/index",
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
            data: "user_name",
            name: "user_name",
        },
        {
            data: "full_name",
            name: "full_name",
        },
        {
            data: "email",
            name: "email",
        },
        {
            data: "phone",
            name: "phone",
        },
        {
            data: "role_name",
            name: "role_name",
        },
        {
            data: "action",
            name: "action",
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

function editUserInfo(userId){
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
            }
        },
    });
}

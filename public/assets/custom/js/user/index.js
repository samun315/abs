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
    $("#kt_department_id").val('').change();
    $("#kt_active").val('').change();
}

function openModal() {
    formReset();
    loader(selectedForm, false);
    $("#kt_user_id").val(null);
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
            data: "pin_number",
            name: "pin_number",
        },
        {
            data: "name",
            name: "name",
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
            data: "department_name",
            name: "department_name",
            orderable: false,
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
                $("#kt_department_id").val(data.department_id).change();
                $("#kt_active").val(data.active).change();
            }
        },
    });
}

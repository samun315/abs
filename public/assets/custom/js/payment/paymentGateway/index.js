let selectedForm = $("#submitForm");

// Get the current URL of the window
const BASE_URL = window.location.origin + "/payment/manual/gateway";

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

$("#openGatewayModal").on("click", function () {
    openModal();
});

function openModal() {
    formReset();
    loader(selectedForm, false);
    $("#kt_gateway_id").val(null);
    $(".modal-title").text("Add New Gateway");
    $(".btnSubmit").text("Submit");
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

    let gatewayId = $("#kt_gateway_id").val();
    let url = "";
    if (gatewayId) {
        url = BASE_URL + "/update/" + gatewayId;
        formData.append("_method", "PUT");
    } else {
        url = BASE_URL + "/store";
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

let table = $("#kt_table_gateway").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: BASE_URL + "/",
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
            data: "gateway_name",
            name: "gateway_name",
        }, 
        {
            data: "details",
            name: "details",
        },  
         {
            data: "currency_code",
            name: "currency_code",
        },
        {
            data: "rate",
            name: "rate",
        },
        {
            data: "active",
            render: function (data) {
                if (!data) return "";

                let statusValue = "";

                if (data == "NO") {
                    statusValue = "Inactive";
                } else if (data == "YES") {
                    statusValue = "Active";
                }

                return `${statusValue}`;
            },
        },
        {
            data: "action",
            name: "action",
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

$(document).on("click", ".editGatewayBtn", function () {
    var gatewayId = $(this).attr("data-id");
    editGatewayInfo(gatewayId);
});

function editGatewayInfo(gatewayId) {
    loader(selectedForm, true);
    $(".error").remove();

    $.ajax({
        url: BASE_URL + "/edit/" + gatewayId,
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

                $(".modal-title").text("Edit Gateway");
                $(".btnSubmit").text("Update");
            }
        },
    });
}


// Initialize CKEditor
document.addEventListener("DOMContentLoaded", () => {
    const detailsElement = document.querySelector(".details");

    if (detailsElement) {
        ClassicEditor.create(detailsElement, {
            styleNonce: "{{ $cspNonce }}",
        })
            .then((editor) => {
                document.querySelector(".btnSubmit").addEventListener("click", (e) => {
                    let terms = editor.getData().trim(); // Get CKEditor 5 content

                    if (terms === "" || terms === "<p><br></p>") {
                        document.querySelector(".terms_error").textContent = "Details field is required.";
                        document.querySelector(".terms_error").style.color = "red";
                        e.preventDefault();
                    } else {
                        document.querySelector(".terms_error").textContent = ""; // Clear error if valid
                    }
                });
            })
            .catch((error) => {
                console.error("Error initializing CKEditor:", error);
            });
    } else {
        console.warn("No element with the class '.details' found.");
    }
});


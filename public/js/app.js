
const start_loading = () => {
    $.LoadingOverlay("show");
}

const stop_loading = () => {
    $.LoadingOverlay("hide");
}

const element_loading = (elem) => {
    $(elem).LoadingOverlay("show", {
        text: "Loading...",
        textAlign: "center", // Center the text
        size: "20px", // Adjust size if needed
        background: "rgba(255, 255, 255, 0.8)", // Background color with transparency
        image: "", // Remove the default spinner
    });
}

const stop_element_loading = (elem) => {
    $(elem).LoadingOverlay("hide", true);
}


// Define default toastr options
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};


function send_request(method, url, data, beforeSend, success, error) {
    return $.ajax({
        url: url,
        method: method, // Default method
        data: data || {}, // Use provided data or an empty object
        beforeSend: function (xhr) {
            if (typeof beforeSend === 'function') {
                beforeSend(xhr);
            }
        },
        success: function (response) {
            if (typeof success === 'function') {
                success(response);
            }
        },
        error: function (xhr, status, err) {
            if (typeof error === 'function') {
                error(xhr, status, err);
            }
        }
    });
}

function clear_error() {
    $('.error-text').text(''); 
}
// Reusable function to handle AJAX response
function handle_form_response(response, form) {
    // Check if there are validation errors
    clear_error()
    if (response.errors) {
        // Loop through each error field and display the error message
        $.each(response.errors, function(field, messages) {
            $('.error-' + field).text(messages[0]); // Display the first error message for each field
        });
    } else {
        // Handle success or failure based on the response
        if (response.success) {
            toastr.success(response.msg); // Display success message using toastr
           
        } else {
            toastr.error(response.msg); // Display error message using toastr
        }

    }
}


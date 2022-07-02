function ajax(url, method, data, success) {
    method = method || "GET";
    data = data || {};

    $.ajax({
        url: url,
        type: method,
        data: data,
        success: function(data) {
            toastr.success(data);
        },
        error: function(xhr, status, err) {
            switch (xhr.status) {
                case 400:
                    toastr.error(xhr.responseJSON.error);
                    break;
                case 401:
                    toastr.error(xhr.responseJSON.error);
                    break;
                case 402:
                    toastr.error(xhr.responseJSON.error);
                    break;
                case 403:
                    toastr.error(xhr.responseJSON.error);
                    break;
                case 404:
                    toastr.error(xhr.responseJSON.error);
                    break;
                default:
                    toastr.error("Un Known Error!");
                    break;
            }
        }
    });
}

toastr.options = {
    "closeButton": true,
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
}

function checkEmail(email) {
    var pattern=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;

    if(pattern.test(email)) {
        return true;
    } else {
        return false;
    }
}

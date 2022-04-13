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

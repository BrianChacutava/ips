const auth = "Bearer " + $('meta[name="api"]').attr('content');
const ajaxSettings = {
    "async": true,
    "crossDomain": true,
    'dataType': 'JSON',
    "headers": {
        "Authorization": auth,
    }
}; 

class AjaxoAuth {
    constructor(url) {
        this.url = url
    }

    delete(callback) {
        let url = this.url
        $.ajax({
            ...ajaxSettings,
            type: "DELETE",
            url: url,
            success: callback
        });
    }
}
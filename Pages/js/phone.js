
const server_id = url_param()
const server_text = get_server_name(server_id)

function url_param() {
    const urlParams = new URLSearchParams(window.location.search);
    return sid = urlParams.get('sid')
}

const get_server_name = (data) => {
    api(data)
}

const api = (data) => {
    $.ajax({
        type: "post",
        url: './../../api/common.php?action=server_name',
        data: data,
        dataType: "dataType",
        success: function (response) {
            
        }
    });
}
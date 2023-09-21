
const server_id = url_param()
const server_text = get_server_name(server_id)
console.log(server_text);

function url_param() {
    const urlParams = new URLSearchParams(window.location.search);
    const sid = urlParams.get('sid')
    return sid
}

const get_server_name = (data) => {
    api(data)
}

const api = (data) => {
    $.ajax({
        type: "post",
        url: '/../../api/common.php?action=server_name',
        data: data,
        dataType: "JSON",
        success: function (response) {
            
        }
    });
}

const server_id = url_param()
const server_text = get_server_name(server_id)
console.log(server_text);

function url_param() {
    const urlParams = new URLSearchParams(window.location.search);
    const sid = urlParams.get('sid')
    return sid
}

function get_server_name (data){
    api(data)
}

function api (data){
    $.ajax({
        type: "post",
        url: '/../../api/common.php?action=server_name',
        data: {
            server: data,
        },
        dataType: "JSON",
        success: function (response) {
            if (response.success){
                $('#server_name').text(response.data.name)
                $('#bg').css('background', response.data.bg)
            }
        }
    });
}
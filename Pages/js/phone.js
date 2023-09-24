
const serverName = urlParam()
const serverData = getServerData(serverName)
renderServer(serverData)    // 更新標題

function renderServer(data){
    $('#server_name').text(`【${data.name}】`)
}

function urlParam() {
    const urlParams = new URLSearchParams(window.location.search);
    const serverName= urlParams.get('sn')   // server name
    return serverName
}

function getServerData (data){
    const serverData = api(data)
    return serverData
}

function api (data){
    let responseData
    $.ajax({
        type: "post",
        url: '/../../api/common.php?action=server_name',
        data: {
            server: data,
        },
        dataType: "JSON",
        async: false,
        success: function (response) {
            if (response.success){
                responseData = response.data
            }
        }
    });
    return responseData
}
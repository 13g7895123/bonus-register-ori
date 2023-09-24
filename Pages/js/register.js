const serverName = urlParam()
let serverData = getServerData(serverName)
const imgDomain = 'http://missa.mercylife.cc/'
serverData.domain = imgDomain
renderServer(serverData)    // 更新標題

const phoneUrl = `?page=phone&sn=${serverName}`   // 手機驗證網址

$('#btn-cancel-register').click(() => {
    $(location).attr('href', registerUrl);
})

function renderServer(data){
    $('#bg').css('background-image', `url(${data.domain}${data.bg})`)   // 背景圖
    $('#server_name').text(`【${data.name}】`)  // 伺服器名稱
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
        data: { server: data },
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
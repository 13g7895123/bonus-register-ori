/* 通用變數定義 */
export const apiUrl = 'http://170.187.229.132:9091/api/bonus-register/'
export const imgDomain = 'http://missa.mercylife.cc/'
/* End 通用變數定義 */

/* Api網址 */
const serverUrl = `${apiUrl}common.php?action=server_name`           // server
const tokenUrl = `${apiUrl}phone.php?action=token`           // server
/* End Api網址 */

/* 伺服器名稱 */
export const getServerData = data => {
    const apiData = {
        url: serverUrl,
        data: { server: data }
    }
    const serverData = api(apiData)
    return serverData
}
/* End 伺服器名稱 */

/* Token */
export const getTokenData = () => {
    const apiUrl = tokenUrl
    const apiData = {
        url: apiUrl,
    }
    const tokenData = api(apiData)
    console.log(tokenData);
    return tokenData
}
/* End Token */

/* 網址參數 */
export const urlParam = () => {
    const urlParams = new URLSearchParams(window.location.search);
    const serverName= urlParams.get('sn')   // server name
    return serverName
}
/* End 網址參數 */

/* Ajax取得後端資料 */
export const api = (data) => {
    let responseData
    $.ajax({
        type: "post",
        url: data.url,
        data: data.data,
        dataType: "JSON",
        async: false,
        success: function (response) {
            responseData = response
        }
    });
    return responseData
}
/* End Ajax取得後端資料 */

/* 提示訊息 */
export const alertMsg = data => {
    let icon = (data.type == 1) ? 'success' : 'error'
    const openAlertData = { 
        icon: icon,
        text: data.msg,
    }
    openAlert(openAlertData)
}
/* End 提示訊息 */

/* 切換頁面 */
export const goPage = url => {
    $(location).attr('href', url);
}
/* End 切換頁面 */
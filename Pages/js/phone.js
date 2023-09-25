
const serverName = urlParam()
let serverDataRes = getServerData(serverName)
if (serverDataRes.success){
    const imgDomain = 'http://missa.mercylife.cc/'
    let serverData = serverDataRes.data
    serverData.domain = imgDomain
    renderServer(serverData)    // 更新標題
}

const registerUrl = `?page=register&sn=${serverName}`   // 註冊網址

/*
 * 按鈕 - 送出
*/
$('#btn_submit').click(() => {
    const phone = $('#inp_phone').val()
    const url = `${registerUrl}&phone=${phone}`
    const code = $('#inp_code').val()   // 認證碼

    const apiUrl = `/../../api/phone.php?action=varify_validation_code`
    const apiData = {
        url: apiUrl,
        data: { 
            phone: phone,
            code: code
        }
    }
    const varifyRes = api(apiData)
    
    if (varifyRes.success){
        alertMsg(varifyRes.msg)
        goPage(url)
    }else{
        alertMsg(varifyRes.msg)
    }    
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

// 取得伺服器名稱
function getServerData (data){
    const apiUrl = `/../../api/common.php?action=server_name`
    const apiData = {
        url: apiUrl,
        data: { server: data }
    }
    const serverData = api(apiData)
    return serverData
}

function api (data){
    let responseData
    $.ajax({
        type: "post",
        url: data.url,
        data: data.data,
        dataType: "JSON",
        async: false,
        success: function (response) {
            responseData = response.data
        }
    });
    return responseData
}

//全域變數 紀錄驗證碼
let code = "";
let checkCode = $('#identifyCode');

//顏色組
var fontColor = ["blue","yellow","red"];
var bgColor = ["yellow","red","blue",];
var ls = ["2px","8px","-2px",];
var iColor;

//隨機設定顏色組合
function randColor(){
    iColor = Math.floor(Math.random()*(fontColor.length));
    return iColor;
}
function createCode(){
    let ci = randColor()
    checkCode.css('color', fontColor[ci])
    checkCode.css('background-color', bgColor[ci])
    checkCode.css('letter-spacing', ls[ci])
	code = ""; 
	var codeLength = 4;//驗證碼的長度	
	var random = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);//隨機數 
	for(var i = 0; i < codeLength; i++  ) {//迴圈操作 
		var index = Math.floor(Math.random()*random.length);//取得隨機數的索引（0~35） 
		code  += random[index];//根據索引取得隨機數加到code上 
	} 
    checkCode.html(code)    //把code值賦給驗證碼
}

createCode()

// $('#identifyCode').click(() => {
//     alert(123)
//     createCode()
// })

/*
 * 按鈕 - 發送認證碼
*/
$('#btn_sendCode').click(() => {
    const phone = $('#inp_phone').val()
    const validationCode = $('#inp_validationCode').val()

    if (phone != ''){
        if (validationCode == code){
            // 發送認證碼
            const apiData = {
                url: '/../../api/phone.php?action=sendCode',
                data: {
                    server: serverName,
                    phone: phone
                }
            }
            api(apiData)
        }else{
            alertMsg('驗證碼錯誤')
        }
    }else{
        alertMsg('請輸入手機號碼')
    }
})

const alertMsg = msg => {
    alert(msg)
}

const goPage = url => {
    $(location).attr('href', url);
}


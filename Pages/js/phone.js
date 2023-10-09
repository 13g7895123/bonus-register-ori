import { urlParam, getServerData, getTokenData, imgDomain } from './common.js'
import { api, alertMsg, goPage } from './common.js'
import { sendCodeUrl, varifyValidationCodeUrl } from './common.js'

/* 渲染伺服器名字 */
const serverName = urlParam('sn')
let serverDataRes = getServerData(serverName)
if (serverDataRes.success){
    let serverData = serverDataRes.data
    serverData.domain = imgDomain
    renderServer(serverData)
}
/* End 渲染伺服器名字 */

/* 取得Token */
let token = ''
const tokenDataRes = getTokenData()
if (tokenDataRes.success){
    token = tokenDataRes.data;
}
/* End 取得Token */

/* 定義變數 */
const registerUrl = `?page=register&sn=${serverName}&token=${token}`    // 註冊網址
let alertData = { type: 0, msg: '' }

/*
 * 按鈕 - 送出
*/
$('#btn_submit').click(() => {
    const phone = $('#inp_phone').val()
    const url = `${registerUrl}&phone=${phone}`
    const validationCode = $('#inp_validationCode').val()
    const code = $('#inp_code').val()   // 認證碼
    const apiUrl = varifyValidationCodeUrl

    if (phone != ''){
        if (validationCode != ''){
            if (code != ''){
                const apiData = {
                    url: apiUrl,
                    data: { 
                        phone: phone,
                        code: code,
                        token: token
                    }
                }
                const varifyRes = api(apiData)
                
                if (varifyRes.success){
                    alertData.type = 1
                    alertData.msg = varifyRes.msg
                    alertMsg(alertData)
                    setTimeout(() => {
                        goPage(url)
                    }, 1000)                    
                }else{
                    alertData.msg = varifyRes.msg
                    alertMsg(alertData)
                }    
            }else{
                alertData.msg = '請輸入認證碼'
                alertMsg(alertData)
            }            
        }else{
            alertData.msg = '請輸入驗證碼'
            alertMsg(alertData)
        }
    }else{
        alertData.msg = '請輸入手機號碼'
        alertMsg(alertData)
    }
})

function renderServer(data){
    $('#bg').css('background-image', `url(${data.domain}${data.bg})`)   // 背景圖
    $('#server_name').text(`【${data.name}】`)  // 伺服器名稱
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

$('#identifyCode').click(() => {
    $('#inp_validationCode').val('')
    createCode()
    $('#inp_validationCode').focus()
})

/*
 * 按鈕 - 發送認證碼
*/
$('#btn_sendCode').click(() => {
    const phone = $('#inp_phone').val()
    const validationCode = $('#inp_validationCode').val()

    if (phone != ''){
        if (validationCode != ''){
            if (validationCode == code){
                // 發送認證碼
                const apiData = {
                    url: sendCodeUrl,
                    data: {
                        server: serverName,
                        phone: phone,
                        token: token
                    }
                }
                const sendCodeRes = api(apiData)
                if (sendCodeRes.success){
                    alertData.type = 1
                    alertData.msg = '認證碼發送成功'
                    alertMsg(alertData)
                }else{
                    alertData.type = 0
                    alertData.msg = sendCodeRes.msg
                    alertMsg(alertData)
                }
            }else{
                alertData.type = 0
                alertData.msg = '驗證碼錯誤'
                alertMsg(alertData)
            }
        }else{
            alertData.msg = '請輸入驗證碼'
            alertMsg(alertData)
        }        
    }else{
        alertData.msg = '請輸入手機號碼'
        alertMsg(alertData)
    }
})




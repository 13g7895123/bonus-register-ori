const { serverName, phone } = urlParam()
let serverData = getServerData(serverName)
const imgDomain = 'http://missa.mercylife.cc/'
serverData.domain = imgDomain
renderServer(serverData)    // 更新標題

const phoneUrl = `?page=phone&sn=${serverName}`   // 手機驗證網址
let columnValidation = 1      // 預設1為成功，只要有一項驗證沒過就設為0

$("#datepicker").datepicker({ dateFormat: 'yy/mm/dd' });

/* 欄位輸入驗證 */
/* 輸入帳號 */
$('#inp_account').blur(() => {
    const accountRes = accountRule()
    if (accountRes.success == 0){
        columnValidation = 0
        $(this).siblings().prev('p.notice').text(accountRes.msg)
    }else{
        columnValidation = 1
        $(this).sibling().prev('p.notice').text('')
    }
})

const accountRule = () => {
    const account = $('#inp_account').val().trim()
    let ruleValidation = { success: 0 }
    if (account == ''){
        ruleValidation.msg = '請輸入帳號'
    }else if (account.length < 5 || account.length > 12){
        ruleValidation.msg = '長度請介於5~12個字母之間'
    }else{
        ruleValidation.success = 1
    }
    return ruleValidation
}
/* End 輸入帳號 */
/* 輸入密碼 */
$('#inp_password').blur(() => {
    const passwordRes = passwordRule()
    if (passwordRes.success == 0){
        columnValidation = 0
        $('#notice_password').text(passwordRes.msg)
    }else{
        columnValidation = 1
        $('#notice_password').text('')
    }
})

const passwordRule = () => {
    const password = $('#inp_password').val().trim()
    let ruleValidation = { success: 0 }
    if (password == ''){
        ruleValidation.msg = '請輸入帳號'
    }else if (password.length < 5 || password.length > 12){
        ruleValidation.msg = '長度請介於5~12個字母之間'
    }else{
        ruleValidation.success = 1
    }
    return ruleValidation
}
/* End 輸入密碼 */
/* End 欄位輸入驗證 */



$('#btn-submit').click(() => {
    const account = $('#inp_account').val()
    const password = $('#inp_password').val()
    const checkPassword = $('#inp_checkPassword').val()
    const birthday = $("#datepicker").val()
    const validationCode = $('#inp_validationCode').val()

    if (validationCode == code){
        if (account != '' &&  password != '' && checkPassword != '' && birthday != ''){
            if (password == checkPassword){
                const apiData = {
                    url: '/../../api/register.php?action=register',
                    data: {
                        server: serverName,
                        phone: phone,
                        account: account,
                        password: password,
                        birthday: birthday
                    }
                }
                const response = api(apiData)
                if (response.success){
                    alertMsg('註冊成功')
                    // 跳轉頁面
                }else{
                    alertMsg('註冊失敗')
                }
            }else{
                alertMsg('密碼不相符')
            }   // End password check
        }else{
            alertMsg('請填入正確的資料')
        }  // End column not empty
    }else{
        alertMsg('驗證碼錯誤')
    }   // End validation code check
})

$('#btn-cancel-register').click(() => {
    $(location).attr('href', phoneUrl);
})

function renderServer(data){
    $('#bg').css('background-image', `url(${data.domain}${data.bg})`)   // 背景圖
    $('#server_name').text(`【${data.name}】`)  // 伺服器名稱
}

function urlParam() {
    const urlParams = new URLSearchParams(window.location.search);
    const serverName = urlParams.get('sn')   // server name
    const phone = urlParams.get('phone')
    const param = {
        serverName: serverName,
        phone: phone
    }
    return param
}

function getServerData (data){
    const apiData = {
        url: '/../../api/common.php?action=server_name',
        data: {
            server: data
        }
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
            if (response.success){
                responseData = response.data
            }
        }
    });
    return responseData
}

//全域變數 紀錄驗證碼
let code = "";

//顏色組
var fontColor = ["blue","yellow","red"];
var bgColor = ["yellow","red","blue",];
var ls = ["2px","8px","-2px",];
var iColor;
// const fontColorLength = fontColor.length

//隨機設定顏色組合
function randColor(){
    iColor = Math.floor(Math.random()*3);
    return iColor;
}
function createCode(){
    let ci = randColor()
    let checkCode = $('#identifyCode');
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

const alertMsg = data => {
    let icon = (data.type == 1) ? 'success' : 'error'
    const openAlertData = { 
        icon: icon,
        text: data.msg,
    }
    openAlert(openAlertData)
}
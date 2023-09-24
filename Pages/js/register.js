const serverName = urlParam()
let serverData = getServerData(serverName)
const imgDomain = 'http://missa.mercylife.cc/'
serverData.domain = imgDomain
renderServer(serverData)    // 更新標題

const phoneUrl = `?page=phone&sn=${serverName}`   // 手機驗證網址

createCode()

$("#datepicker").datepicker({ dateFormat: 'yy/mm/dd' });

$('btn-submit').click(() => {
    const account = $('#inp_account').val()
    const password = $('#inp_password').val()
    const checkPassword = $('#inp_checkPassword').val()
})

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
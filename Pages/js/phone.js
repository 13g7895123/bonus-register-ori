
const serverName = urlParam()
let serverData = getServerData(serverName)
const imgDomain = 'http://missa.mercylife.cc/'
console.log(serverData);
// serverData.domain = imgDomain
console.log(serverData);
renderServer(serverData)    // 更新標題

const registerUrl = `?page=register&sn=${serverName}`   // 註冊網址


/*
 * 按鈕 - 送出
*/
$('#btn_submit').click(() => {
    const phone = $('#inp_phone').val()
    const url = `${registerUrl}&phone=${phone}`

    // 取得認證碼
    // 驗證認證碼
    goPage(url)
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

//更新驗證碼
// var recode=document.getElementById('recode');
// recode.addEventListener("click",function(e){
// 	createCode();
//     document.getElementById("input").value = "";//清空文字框
//     e.preventDefault();	
// });

// //點擊更新驗證碼
// checkCode.addEventListener("click",function(e){
// 	createCode();
//   document.getElementById("input").value = "";//清空文字框
//   e.preventDefault();	
// });

// //驗證
// var validate=document.getElementById('validate');
// validate.addEventListener("click",function(e){
// 	var inputCode = document.getElementById("input").value.toUpperCase(); //取得輸入的驗證碼並轉化為大寫 
// 	if(inputCode.length <= 0) { //若輸入的驗證碼長度為0 
// 		alert("請輸入驗證碼！"); //則彈出請輸入驗證碼 
// 	} 
// 	else if(inputCode !== code ) { //若輸入的驗證碼與產生的驗證碼不一致時 
//       alert("驗證碼輸入錯誤！@_@"); //則彈出驗證碼輸入錯誤 
//       createCode();//重新整理驗證碼 
// 	    document.getElementById("input").value = "";//清空文字框 
// 	} 
// 	else { //輸入正確時 
// 		alert("^-^"); //彈出^-^ 
//     createCode();//重新整理驗證碼 
//     document.getElementById("input").value = "";//清空文字框 
// 	} 
// });

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


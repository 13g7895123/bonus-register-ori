<div id='bg' class="w-full h-full">
    <div id="register-box" class="rounded-lg">
        <div id="mask"></div>
        <div id='title' class="text-white mt-12">註冊帳號</div>
        <div id='server_name' class="text-white mt-3"></div>
        <form id="form_area">
            <div class="inp_group mt-3">
                <input id='inp_account' @blur="accountRule" required>
                <span class="column">遊戲帳號</span>
                <!-- <span class="notice text-red">{{ accountValidation }}</span> -->
                <i></i>
            </div>
            <div class="inp_group mt-2">
                <input id='inp_password' @blur="passwordRule" @valid="passwordRule" @focus="passwordFocus" type="password" required>
                <span class="column">密碼</span>
                <!-- <span class="notice text-red">{{ passwordValidation }}</span> -->
                <i></i>
            </div>
            <div class="inp_group mt-2">
                <input id='inp_checkPassword' type="password" required style="white-space: normal;">
                <span class="column">確認密碼</span>
                <i></i>
            </div>
            <div class="inp_group mt-2">
                <input type="text" id="datepicker" placeholder="出生年月日" size="30">
                <i></i>
            </div>
            <div class="inp_group mt-2">
                <input id='inp_validationCode' required>
                <span class="column">驗證碼</span>
                <i style="width: 58%;"></i>
                <p id='identifyCode'></p>
            </div>
            <div 
                id="btn-submit"
                class="bg-white rounded flex justify-center items-center btn py-1 mt-6"
                >提交註冊</div>
            <div
                id='btn-cancel-register'
                class="bg-white rounded flex justify-center items-center btn py-1 mt-3"
                >取消註冊</div>
        </form>
    </div>
</div>
<style>
#bg{
    display: flex;
    align-items: center;
    justify-content: center;
    background: no-repeat;
    background-size: cover;
    background-position: center;
    animation: bg-rotate 5s linear infinite;
}
@keyframes bg-rotate{
    100% {
        filter: hue-rotate(360deg);
    }
} 
html {
    overflow: -moz-hidden-unscrollable;
    height: 100%;
}
body::-webkit-scrollbar {
    display: none;
}
body {
    -ms-overflow-style: none;
    height: 100%;
	width: calc(100vw + 18px);
	overflow: auto;
}
/* --- scroll bar hide end --- */
#mask{
    width: calc(100% - 6px);
    height: calc(100% - 6px);
    position: absolute;
    top: 3px;
    left: 3px;
    border-radius: 8px;
    background-color: black;
    z-index: 1;
}

#register-box{
    width: 350px;
    height: 560px;
    display: flex;
    flex-direction: column;
    align-items: center;
    backdrop-filter: blur(10px);
    overflow: hidden;
    inset: 3px;
    z-index: 20;
}

#title{
    display: block;
    font-size: 1.5em !important;
    margin-top: 48px;
    z-index: 20;
}

#server_name{
    display: block;
    font-size: 1.17em !important;
    z-index: 20;
}

#register-box::before{
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 400px;
    height: 570px;
    background: linear-gradient(60deg, transparent, #45f3ff, #45f3ff);
    transform-origin: bottom right;
    animation: animate 6s linear infinite;
    z-index: -1;
}

#register-box::after{
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 400px;
    height: 570px;
    background: linear-gradient(60deg, transparent, #d9138a, #d9138a);
    transform-origin: bottom right;
    animation: animate 6s linear infinite;
    animation-delay: -3s;
    z-index: -1;
}
@keyframes animate{
    0%{
        transform: rotate(0deg);
    }
    100%{
        transform: rotate(360deg);
    }
}

h2, h3, #form_area{
    z-index: 20;
}

#form_area{
    width: 80%;
}

.inp_group{
    /* margin-top: 0.5em; */
    position: relative;
}

.inp_group input{
    position: relative;
    width: 100%;
    padding: 20px 10px 10px;
    background-color: transparent;
    border: none;
    outline: none;
    box-shadow: none;
    color: #fff;
    font-size: 1em;
    letter-spacing: 0.05em;
    transition: 0.5s;
}

.inp_group span{
    position: absolute;
    left: 0;
    padding: 20px 10px 10px;
    font-size: 1em;
    color: #fff;
    pointer-events: none;
    letter-spacing: 0.05em;
    transition: 0.5s;
}

.inp_group input:valid ~span,
.inp_group input:focus ~span{
    font-size: 0.75em;
    transform: translate(-10px, -15px);
}

.inp_group i{
    position: absolute;
    left: 0;
    bottom: 0;
    background-color: #fff;
    width: 100%;
    height: 2px;
}

#btn_send_code{
    padding: 2px 10px 2px 10px;
    border-radius: 5px;
    position: absolute;
    right: 0px;
    top: 20px;
}

.btn{
    display: flex;
    cursor: pointer;
    background-color: #fff;
}

.code-box{
    position: absolute;
    right: 0;
    top: 14px;
}

#identifyCode { 
    cursor: pointer;
    font-family:Arial; 
    font-style:italic; 
    font-weight:bold; 
    border:0; 
    letter-spacing:2px; 
    color:blue;
    background-color: red;
    padding:4px;
    width:110px;
    height:40px;
    text-align:center;
    position: absolute;
    right: 0;
    top: 14px;
} 
</style>
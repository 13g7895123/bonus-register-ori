<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>藥局滯銷健保藥品互換平台</title>

    <link href='../dist/output.css' rel='stylesheet'> 
</head>
<body>
    <div class='w-[700px] h-96 mx-auto mt-[10dvh] border-2 border-slate-300 flex shadow-lg'>
        <div class='w-[calc(100%-16rem)] h-full'>
            <img src='../assets/images/login_img.png' class='w-auto h-full object-cover object-right'>
        </div>
        <div class=' w-64 h-full border-l-2 border-slate-300 flex flex-col items-center px-3'>
            <div class='text-2xl font-bold mt-10'>會員登入</div>
            <input name='account' class='text-xl pl-1 pb-1 outline-none border-b-2 border-slate-400 mt-10' placeholder='帳號'>
            <div class='relative flex'>
                <input name='pwd' class='text-xl pl-1 pb-1 outline-none border-b-2 border-slate-400 mt-5' placeholder='密碼' type='password'>
                <img src='../assets/images/hide.png' id='showPwd' class="w-6 h-6 absolute right-1 bottom-2 animate-3 cursor-pointer">
            </div>
            <div class='w-full mt-10 flex justify-center text-justify'>
                <div id='btn_submit' class=' w-32 h-auto flex justify-around items-center px-5 py-1 text-xl text-justify font-bold bg-green-300 animate-3 hover:bg-green-500 rounded-full cursor-pointer'>登入</div>
            </div>
            <div class='mt-5'>還不是會員?<a href='./register.php' class='cursor-pointer text-blue-600 animate-3 hover:font-extrabold hover:border-b-2 hover:border-blue-600 duration-100'>馬上加入!</a></div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="./js/login.js"></script> 
    <script>$(document).ready(() => {})</script> 
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/d804364582.js" crossorigin="anonymous"></script>
</body>
</html>

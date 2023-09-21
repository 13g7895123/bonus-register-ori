<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>加入會員</title>

    <link href='../dist/output.css' rel='stylesheet'> 
</head>
<body>
    <div class='w-[700px] h-[26rem] mx-auto mt-[10dvh] px-7 py-5 border-2 border-slate-300 flex flex-col shadow-lg'>
        <div class='flex w-full justify-around'>
            <div class='w-1/2 flex flex-col'>
                <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>會員帳號</label>
                    <input name='account' class='w-44 pl-1 border-2 border-slate-300 outline-none' autocomplete="off">
                </div>
                <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>會員密碼</label>
                    <div class='relative flex'>
                        <input name='pwd' class='w-44 pl-1 border-2 border-slate-300 outline-none' type='password'>
                        <img src='../assets/images/hide.png' id='showPwd' class="w-5 h-5 absolute right-2 top-1 animate-3 cursor-pointer">
                    </div>
                </div>
                <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>確認密碼</label>
                    <div class='relative flex'>
                        <input name='pwd_checked' class='w-44 pl-1 border-2 border-slate-300 outline-none' type='password'>
                        <img src='../assets/images/hide.png' id='showPwdCheck' class="w-5 h-5 absolute right-2 top-1 animate-3 cursor-pointer">
                    </div>
                </div>
                <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>藥局名稱</label>
                    <input name='pharmacy_name' class='w-44 pl-1 border-2 border-slate-300 outline-none' autocomplete="off">
                </div>
                <div class='flex mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>地址</label>
                    <div class='flex flex-col'>
                        <select id='address1' name='address1' class='w-44 pl-1 py-1 border-2 border-slate-300 outline-none bg-transparent'></select>
                        <select name='address2' class='w-44 pl-1 py-1 border-2 border-slate-300 outline-none bg-transparent mt-1'></select>
                        <input name='address3' class='w-44 pl-1 border-2 border-slate-300 outline-none mt-1'>
                    </div>
                </div>
            </div>
            <div class='w-1/2 flex flex-col'>
                <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>連絡人</label>
                    <input name='contact_name' class='w-44 pl-1 border-2 border-slate-300 outline-none' autocomplete="off">
                </div>
                <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>手機號碼</label>
                    <input name='phone' class='w-44 pl-1 border-2 border-slate-300 outline-none' autocomplete="off" placeholder="09xxxxxxxx">
                </div>
                <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>信箱</label>
                    <input name='mail' class='w-44 pl-1 border-2 border-slate-300 outline-none' type='email' autocomplete="off">
                </div>
                <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>醫療機構代號</label>
                    <input name='medical_institution_code' class='w-44 pl-1 border-2 border-slate-300 outline-none' autocomplete="off">
                </div>
                <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>醫療機構種類</label>
                    <select name='medical_institution_cate' class='w-44 pl-1 py-1 border-2 border-slate-300 outline-none bg-transparent'>
                        <option value='0'>選擇種類</option>
                        <option value='1'>自開藥局</option>
                        <option value='2'>受聘藥師</option>
                    </select>
                </div>
            </div>
        </div>
        <div class='w-full mt-10'>
            <div id='btn_group' class='btn-group w-72 flex justify-around mx-auto'>
                <div id='btn_clear' class='btn px-5 py-1 rounded-md text-black hover:text-slate-700 bg-red-100 hover:bg-red-300'>清除重填</div>
                <div id='btn_submit' class='btn px-5 py-1 rounded-md text-white hover:text-slate-700 bg-green-500 hover:bg-green-300'>加入會員</div>
                <!-- <div id='btn_test' class='btn px-5 py-1 rounded-md text-white hover:text-slate-700 bg-blue-500 hover:bg-blue-300'>TEST</div> -->
            </div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
    <!-- <script src="./js/register.js"></script>  -->
    <!-- <script type='module' src="./test/register.js"></script> -->
    <script type='module' src="./js/register.js"></script>
    <script>$(document).ready(() => {})</script>
</body>
</html>

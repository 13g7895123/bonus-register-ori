<div class='w-[700px] h-[26rem] mx-auto mt-[10dvh] px-7 py-5 border-2 border-slate-300 flex flex-col relative shadow-lg bg-white'>
        <div class='flex w-full justify-around'>
            <div class='w-1/2 flex flex-col'>
                <!-- <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>會員帳號</label>
                    <input name='account' class='w-44 pl-1 border-2 border-slate-300 outline-none' autocomplete="off">
                </div> -->
                
                <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>連絡人</label>
                    <input name='contact_name' class='w-44 pl-1 border-2 border-slate-300 outline-none' autocomplete="off">
                </div>
                <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>手機號碼</label>
                    <input name='phone' class='w-44 pl-1 border-2 border-slate-300 outline-none' autocomplete="off">
                </div>
                <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>信箱</label>
                    <input name='mail' class='w-44 pl-1 border-2 border-slate-300 outline-none' type='email' autocomplete="off">
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
                <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>醫療機構代號</label>
                    <input name='medical_institution_code' class='w-44 pl-1 border-2 border-slate-300 outline-none' autocomplete="off">
                </div>
                <div class='flex items-center mt-5'>
                    <label class='w-28 tracking-widest text-base text-right mr-3'>醫療機構種類</label>
                    <select id='medical_institution_cate' name='medical_institution_cate' class='w-44 pl-1 py-1 border-2 border-slate-300 outline-none bg-transparent'>
                        <option value='0'>選擇種類</option>
                        <option value='自開藥局'>自開藥局</option>
                        <option value='受聘藥師'>受聘藥師</option>
                    </select>
                </div>
            </div>
        </div>
        <div class='w-full mt-10'>
            <div id='btn_group' class='btn-group w-72 flex justify-around mx-auto'>
                <!-- <div id='btn_clear' class='btn px-5 py-1 rounded-md text-black hover:text-slate-700 bg-red-100 hover:bg-red-300'>清除重填</div> -->
                <div id='btn_submit' class='btn px-5 py-2 rounded-md text-white font-bold hover:text-slate-700 tracking bg-green-500 hover:bg-green-300'>更新資料</div>
                <!-- <div id='btn_test' class='btn px-5 py-1 rounded-md text-white hover:text-slate-700 bg-blue-500 hover:bg-blue-300'>TEST</div> -->
            </div>
        </div>
        
        <div id='notify' class="w-96 h-66 border-2 border-slate-200 rounded-lg bg-white absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 p-5 z-30 flex-col items-center shadow-md hidden">
            <div class="w-12 h-12 border-4 border-yellow-400 rounded-full flex justify-center items-center mx-auto mt-3">
                <i class="fa-solid fa-exclamation text-4xl font-extrabold text-yellow-400"></i>
            </div>
            <label class="mx-auto mt-5 text-2xl font-extrabold">請輸入密碼以完成資料變更</label>
            <input id='pwd_check' class="w-[70%] h-9 mt-3 border border-slate-400 rounded-sm pl-5 tracking-6" type="password">
            <div id='btn_send' class="mt-3 flex justify-center items-center py-1 px-3 text-white font-extrabold text-xl bg-blue-400 hover:bg-blue-500 focus:outline-none rounded-md tracking-5 cursor-pointer">送出</div>
        </div>
    </div>
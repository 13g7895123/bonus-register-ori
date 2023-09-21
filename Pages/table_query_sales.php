<div id='transactionList' class='w-[1280px] h-[85vh] hidden relative flex-col justify-center items-center mx-auto py-5 px-3 rounded-md bg-white'>
    <!-- INQUIRE -->
    <div class='w-[97%] border-2 border-slate-400 px-7 pt-5 pb-2 rounded-md'>
        <div class='w-full'>
            <div class="relative">
                <!-- <label for="code" >藥品健保碼</label> -->
                <!-- <select type="text" name="code" id="code" placeholder="藥品健保碼" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 appearance-none bg-transparent placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA"></select> -->
                <input type="text" name="code" id="code" placeholder="藥品健保碼" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
                <label for="code" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">藥品健保碼</label>
            </div>
        </div>
        <div class='w-full flex mt-1'>
            <div class="relative mt-6 w-1/3 pr-5">
                <input type="text" name="chinese_name" id="inp_chinese_name" placeholder="中文名稱" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
                <label for="chinese_name" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">中文名稱</label>
            </div>
            <div class="relative mt-6 w-1/3 pr-5">
                <input type="text" name="eng_name" id="inp_eng_name" placeholder="英文名稱" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
                <label for="eng_name" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">英文名稱</label>
            </div>
            <div class="relative mt-6 w-1/3">
                <input type="text" name="ingredient" id="inp_ingredient" placeholder="成分" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
                <label for="ingredient" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">成分</label>
            </div>
        </div>
        <!-- BTNs -->
        <div id='btns' class='w-full flex mt-4 justify-end'>
            <div id='btn_require' class='btn mr-2 bg-green-300 hover:bg-green-500 hover:text-white hover:font-bold'>
                <i class="fa-solid fa-magnifying-glass"></i>
                <span class='ml-1'>查詢</span>
            </div>            
            <div id='btn_cancel' class='btn bg-red-400 hover:bg-red-500 hover:text-white hover:font-bold'>
                <i class="fa-sharp fa-solid fa-ban"></i>
                <span class='ml-1'>取消</span>
            </div>
        </div>
    </div>
    <!-- data table -->
    <div id='data_table' class='w-full h-[65%] relative mt-4 px-3'>
        <!-- COLUMNS -->
        <div id='table_col' class='flex justify-around border-b-2 border-slate-200'>
            <div class='query_sales_medicine_code font-bold'>健保碼</div>
            <div class='query_sales_medicine_name font-bold'>名稱</div>
            <div class='query_sales_eng_name font-bold'>成分</div>
            <div class='query_sales_sale_number font-bold'>拍賣量</div>
            <div class='query_sales_sale_price font-bold'>價格</div>
            <div class='query_sales_expiry_date font-bold'>到期日</div>
            <div class='query_sales_medical_institution_name font-bold'>藥局</div>
            <div class='query_sales_phone font-bold'>藥局電話</div>
        </div>
        <!-- DATAS -->
        <div id='table_data' class=' max-h-[90%] mt-3 mb-3 overflow-y-scroll no-scrollbar [&>*:nth-child(odd)]:bg-green-300 group'></div>
        <!-- <div id='table_data' class='flex justify-around'>
            <div>健保碼</div>
            <div>中文名稱</div>
            <div>英文名稱</div>
            <div>拍賣量</div>
            <div>到期日</div>
        </div> -->
    </div>
    <!-- <div class='w-[97%] border border-slate-500 py-1 pl-3 flex justify-center items-center rounded-md shadow-lg cursor-pointer hover:bg-slate-200 hover:border-none'>
        <i class="fa-solid fa-magnifying-glass"></i>
        <span class='tracking ml-1'>搜尋</span>
    </div> -->
</div>


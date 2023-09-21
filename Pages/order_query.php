<div id='' class='w-[1280px] h-[70vh] relative flex-col justify-center items-center mx-auto py-5 px-3 rounded-md bg-white'>
    <!-- data table -->
    <div id='data_table' class='w-full h-[99%] relative mt-4 px-3'>
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
</div>
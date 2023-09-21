<div id='AddPage' class='w-[700px] hidden relative mx-auto px-5 py-3 border-2 border-slate-400 rounded-lg bg-white transition-opacity animate-3'>
    <div class='w-full mt-3'>
        <div class="relative">
            <input type="text" name="code" id="code" placeholder="藥品健保碼" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
            <label for="code" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">藥品健保碼</label>
        </div>
    </div>
    <div class='w-full flex'>
        <div class="relative mt-6 w-1/2">
            <input disabled type="text" name="chinese_name" id="inp_chinese_name" placeholder="中文名稱" class="peer mt-1 w-full border-b-2 border-gray-200 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
            <label for="chinese_name" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">中文名稱</label>
        </div>
        <div class="relative mt-6 w-1/2">
            <input disabled type="text" name="eng_name" id="inp_eng_name" placeholder="英文名稱" class="peer mt-1 w-full border-b-2 border-gray-200 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
            <label for="eng_name" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">英文名稱</label>
        </div>
    </div>
    <div class='w-full flex'>
        <div class="relative mt-6 w-1/2">
            <input disabled type="text" name="ingredient" id="inp_ingredient" placeholder="成分" class="peer mt-1 w-full border-b-2 border-gray-200 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
            <label for="ingredient" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">成分</label>
        </div>
        <div class="relative mt-6 w-1/2">
            <input disabled type="text" name="price" id="inp_price" placeholder="健保價" class="peer mt-1 w-full border-b-2 border-gray-200 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
            <label for="price" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">健保價</label>
        </div>
    </div>
    <div class='w-full flex mt-6'>
        <div class="relative w-1/2">
            <input type="text" name="sale_number" id="inp_sale_number" placeholder="拍賣數量" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
            <label for="sale_number" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">拍賣數量</label>
        </div>
        <div class="relative w-1/2">
            <input type="text" name="sale_price" id="inp_sale_price" placeholder="拍賣價格" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
            <label for="code" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">拍賣價格</label>
        </div>
    </div>
    <div class='w-full mt-6'>
        <div class="relative">
            <input type="text" name="expiry_date" id="inp_expiry_date" placeholder="藥品到期日 (西元年-月-日)" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
            <label for="expiry_date" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">藥品到期日 (西元年-月-日)</label>
        </div>
    </div>
    <div class='text-sm mt-2'>* 拍賣數量、拍賣價格、藥品到期日，三個項目可透過"逗號"分隔，一次新增多筆"同藥品"資料</div>
    <div id='btn_add' class='btn px-3 py-1 mt-5 bg-green-300 hover:bg-green-500 hover:text-white'>
        <i class="fa-solid fa-plus"></i>
        <span class='ml-1'>新增</span>
    </div>
</div>


<div id='123'></div>
<script>
    async function getData() {
        try {
            const response = await fetch('http://assistant.mercylife.cc/Pages/ajax/test.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    test: 'John Doe'
                })
            });
            const data = await response.json();
            const div123 = document.getElementById('123');
            div123.innerHTML = data.test;
            console.log(data.test);
        } catch (error) {
            console.error(error);
        }
    }
    getData();
</script>
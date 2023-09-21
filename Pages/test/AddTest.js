import { getDataNoInput } from "../js/tools_ajax.js"

// 取得各變數數值
const medicineInf = getDataNoInput('../Pages/test/AddTest.php', 'medicineCode')
const medicineInfCount = medicineInf.length

const getRandomNumber = (max) => {
    const min = 1
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

const getDay = (day) => {
    const days = new Date()
    const getTimes = days.getTime() + 1000 * 60 * 60 * 24 * day
    days.setTime(getTimes)
    const year = days.getFullYear()
    const month = days.getMonth() < 10 ? '0' + (days.getMonth() + 1 ) : (days.getMonth() + 1)
    const today = days.getDate() < 10 ? '0' + days.getDate() : days.getDate()

    return `${year}-${month}-${today}`
}

const btnTestClick = () => {
    $('#btnTest').click(() => {
        // 定義輸入欄位
        // var medicineCode, saleNumber, salePrice, expiry_date

        // // 亂數取得欄位數值
        // medicineCode = medicineInf[getRandomNumber(medicineInfCount)]['medicine_code']
        // saleNumber = getRandomNumber(100)
        // salePrice = getRandomNumber(100)
        // expiry_date = getDay(getRandomNumber(365))

        // // 寫入欄位
        // $('input[name="code"]').val(medicineCode);
        // $('#inp_sale_number').val(saleNumber);
        // $('#inp_sale_price').val(salePrice);
        // $('#inp_expiry_date').val(expiry_date);

        // 寫入欄位
        $('input[name="code"]').val('AB43122151');
        $('#inp_sale_number').val('1,2,3');
        $('#inp_sale_price').val('1,2,3');
        $('#inp_expiry_date').val('2023-04-28,2023-04-28,2023');

        // 送出資料
        $('#btn_add').click();
    })
}

export const addTestBtn = () => {
    $('#AddPage').append(`
        <div id='btnTest' class='btn px-3 py-1 mt-3 bg-blue-300 hover:bg-blue-500 hover:text-white'>測試</div>
    `)
    btnTestClick()
}

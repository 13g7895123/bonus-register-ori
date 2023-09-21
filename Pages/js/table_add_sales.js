import { strTooLong } from './tools.js'

$('input[name="code"]').val('');
$('input[name="chinese_name"]').val('');
$('input[name="eng_name"]').val('');
$('input[name="ingredient"]').val('');
$('input[name="price"]').val('');
$('input[name="sale_number"]').val('');
$('input[name="sale_price"]').val('');
$('input[name="expiry_date"]').val('');

$('#AddPage').show(300);
$('input[name="code"]').focus();

$('input[name="code"]').on('input change', () => {
    let code = $('input[name="code"]').val();
    if (code.length == 10){
        let jsonData = { code: code };
        let medicineDetail = get_data('get_medicine_detail', jsonData);

        // 字數太長後面改成"..."
        const ingredient = strTooLong(medicineDetail.ingredient, 30)

        $('#inp_chinese_name').val(medicineDetail.medicine_name);
        $('#inp_eng_name').val(medicineDetail.eng_name);
        $('#inp_ingredient').val(ingredient);
        $('#inp_price').val(medicineDetail.price);
    }else{
        $('#inp_chinese_name').val('');
        $('#inp_eng_name').val('');
        $('#inp_ingredient').val('');
        $('#inp_price').val('');
    }
})

$('#btn_add').click(() => {
    var medicineCode = $('input[name="code"]').val();
    var saleNumber = $('#inp_sale_number').val();
    var salePrice = $('#inp_sale_price').val();
    var expiryDate = $('#inp_expiry_date').val();

    if (medicineCode !== '' && saleNumber !== '' && salePrice !== '' && expiryDate !== ''){

        let jsonData, exeResult
        exeResult = 0

        // 檢測輸入資料筆數是否正確(有逗號表示資料不只一筆)
        if (saleNumber.includes(',') || salePrice.includes(',') || expiryDate.includes(',')){
            
            const countSaleNumber = saleNumber.split(',').length
            const countSalePrice = salePrice.split(',').length
            const countExpiryDate = expiryDate.split(',').length

            // 欄位中字串個數相同
            if (countSaleNumber == countSalePrice && countSalePrice == countExpiryDate){
                const dataCount = countSaleNumber
                const saleNumbers = saleNumber.split(',')
                const salePrices = salePrice.split(',')
                const expiryDates = expiryDate.split(',')

                let muiltyJudge = 0
                let insertId = []
                for (let i = 0; i < dataCount; i++){
                    jsonData = {
                        medicine_code: medicineCode,
                        sale_number: saleNumbers[i],
                        sale_price: salePrices[i],
                        expiry_date: expiryDates[i]
                    }
                    exeResult = get_data('submit', jsonData);
                    insertId = [...insertId, exeResult]     // immutable的push
                    if (!exeResult > 0) muiltyJudge = 1
                }
                if (muiltyJudge == 0){
                    alert(`新增${dataCount}筆記錄成功`);
                }else{
                    for (let i = 0; i < insertId.length; i++){
                        jsonData = {'id': insertId[i]}
                        get_data('delete', jsonData);
                    }
                    alert(`新增${dataCount}筆記錄失敗`);
                }
            }
            
        }else{  // 單筆資料輸入
            jsonData = {
                medicine_code: medicineCode,
                sale_number: saleNumber,
                sale_price: salePrice,
                expiry_date: expiryDate
            }
            exeResult = get_data('submit', jsonData);   // 回傳取得insert id
            if (exeResult > 0){
                alert('新增記錄成功');
            }
                // location.href = '?page=table_query_sales_list';
        }
    }
    // console.log(ajax_token);
})

const get_data = (action, data) => {
    let return_data;
    $.ajax({
        type: "POST",
        // url: ajax_url + '?action=' + action,
        // url: `${ajax_url}?action=${action}&token=${ajax_token}`,
        url: `${ajax_url}?action=${action}`,
        data: {data: JSON.stringify(data)},
        dataType: "JSON",
        async: false,
        success: function (data) {
            if (data.success) {
                return_data = data.data;
            } else {
                alert(data.msg);
                if (action == 'get_medicine_detail'){
                    $('input[name="code"]').val('')
                }
            }
        }, error: function () {
            if (action != 'submit'){
                alert("獲取資料失敗");
            }
        }
    });
    return return_data;
}

// 以下為測試使用
// import { addTestBtn } from "../test/AddTest.js";
// addTestBtn();


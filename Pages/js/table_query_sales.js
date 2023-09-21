$('#transactionList').show(500);
$('#transactionList').removeClass('hidden');
$('#transactionList').css('display', 'flex');

// 按鈕頁面跳轉
$('#btn_add').click(() => {location.href = '../index.php?page=table_add_sales'});
$('#btn_inquire').click(() => {location.href = '../index.php?page=table_inquire_sales'});

get_data_and_render();

// 取得資料 & RENDER
function get_data_and_render(){
    var sales_data = get_data('sales_data');
    for (var i = 0; i < sales_data.length; i++){
        $('#table_data').append(`
            <div class='table_data flex justify-around py-1 cursor-pointer rounded-full'>
                <div class='query_sales_medicine_code'>${sales_data[i].medicine_code}</div>
                <div class='query_sales_medicine_name'>
                    <div>${sales_data[i].eng_name}</div>
                    <div class='text-sm'>${sales_data[i].medicine_name}</div>
                </div>
                <div class='query_sales_eng_name'>${sales_data[i].ingredient}</div>
                <div class='query_sales_sale_number'>${sales_data[i].sale_number}</div>
                <div class='query_sales_sale_price'>${sales_data[i].sale_price}</div>
                <div class='query_sales_expiry_date'>${sales_data[i].expiry_date}</div>
                <div class='query_sales_medical_institution_name'>${sales_data[i].medical_institution_name}</div>
                <div class='query_sales_phone'>${sales_data[i].phone}</div>
            </div>
        `)
    }
    $('.table_data').addClass('hover:bg-black');
    $('#table_data').trigger("create");  
}

// BTN REQUIRE
$('#btn_require').click(() => {
    var code = $('#code').val().toUpperCase();
    var chinese_name = $('#inp_chinese_name').val();
    var eng_name = $('#inp_eng_name').val();
    var ingredient = $('#inp_ingredient').val();

    if (code != '' || chinese_name != '' || eng_name != '' || ingredient != ''){
        var require_data = {
            code: code ,
            chinese_name: chinese_name ,
            eng_name: eng_name ,
            ingredient: ingredient 
        }
        var medicine_data = get_data('require_data', require_data);
        if (medicine_data.length > 0){
            $('#table_data').hide(200);
            $('#table_data').empty();
            for (var i = 0; i < medicine_data.length; i++){
                $('#table_data').append(`
                    <div class='table_data flex justify-around py-1 cursor-pointer rounded-full'>
                    <div class='query_sales_medicine_code'>${medicine_data[i].medicine_code}</div>
                    <div class='query_sales_medicine_name break-words'>${medicine_data[i].medicine_name}</div>
                    <div class='query_sales_eng_name break-words'>${medicine_data[i].eng_name}</div>
                    <div class='query_sales_sale_number'>${medicine_data[i].sale_number}</div>
                    <div class='query_sales_sale_price'>${medicine_data[i].sale_price}</div>
                    <div class='query_sales_expiry_date'>${medicine_data[i].expiry_date}</div>
                    <div class='query_sales_medical_institution_name'>${medicine_data[i].medical_institution_name}</div>
                    <div class='query_sales_phone'>${medicine_data[i].phone}</div>
                    </div>
                `);
            }
            $('#table_data').show(200);
        }
    }else if(code == '' && chinese_name == '' && eng_name == '' && ingredient == ''){
        $('#table_data').empty();
        $('#data_table').addClass('hidden');
    }
})

// BTN CANCEL
$('#btn_cancel').click(() => {
    history.go(0)
})

function get_data(action, data){
    var return_data;
    $.ajax({
        type: "POST",
        url: ajax_url + '?action=' + action,
        data: {data: JSON.stringify(data)},
        dataType: "JSON",
        async: false,
        success: function (data) {
            if (data.success) {
                return_data = data.data;
            } else {
                alert(data.msg);
            }
        }, error: function () {
            alert("獲取資料失敗");
        }
    });

    return return_data;
}
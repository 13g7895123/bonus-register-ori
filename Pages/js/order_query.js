get_data_and_render();

// 取得資料 & RENDER
function get_data_and_render(){
    var sales_data = get_data('sales_data');
    console.log(sales_data);
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
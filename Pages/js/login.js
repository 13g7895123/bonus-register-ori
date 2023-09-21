// INIT
$(':input').val('');

// BTN CLICK
$('#btn_submit').click( () => {
    
    // 01. 取得INPUT值
    var acc = $('input[name="account"]').val();
    var pwd = $('input[name="pwd"]').val();

    // 02. 基礎驗證數值
    if (acc == '' || pwd == ''){
        alert('請確認帳號密碼有正確填寫!');
    }else if (acc != '' && pwd != ''){
        submit(acc, pwd);
    }
})

// SHOW PWD OR NOT
let show = 0
$('#showPwd').click(() => {
    show = !show
    if (!show){
        $('input[name="pwd"]').attr('type', 'password')
        $('#showPwd').attr('src', '../assets/images/hide.png')
    }else if (show){
        $('input[name="pwd"]').attr('type', 'text')
        $('#showPwd').attr('src', '../assets/images/view.png')
    }  
})

const submit = (acc, pwd) => {
    $.ajax({
        type: "POST",
        url: "./ajax/login.php?action=submit",
        data: {
            account: acc,
            password: pwd
        },
        dataType: "JSON",
        success: function (response) {
            if (response.success) {
                location.href = '../../index.php?page=table_query_sales_list';
            }else{
                alert(response.msg);
            }
        }
    });
}
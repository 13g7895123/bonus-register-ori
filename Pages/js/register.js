import { getData } from "./tools_ajax.js";

// INIT
init()

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
let showCheck = 0
$('#showPwdCheck').click(() => {
    showCheck = !showCheck
    if (!showCheck){
        $('input[name="pwd_checked"]').attr('type', 'password')
        $('#showPwdCheck').attr('src', '../assets/images/hide.png')
    }else if (showCheck){
        $('input[name="pwd_checked"]').attr('type', 'text')
        $('#showPwdCheck').attr('src', '../assets/images/view.png')
    }  
})

// DEFINE SELECT
const selCountry = $('select[name="address1"]')
const selArea = $('select[name="address2"]')

// GET COUNTRY DATA
let countryData = getDataInit('../Pages/ajax/register.php', 'country');

// RENDER COUNTRY DATA
selCountry.empty()
selCountry.append('<option value=0>選擇縣市</option>')
selArea.append('<option value=0>選擇區域</option>')
for (let i = 0; i < countryData.length; i++){
    selCountry.append(`
        <option value=${countryData[i]['id']}>${countryData[i]['name']}</option>
    `)
}
// RENDER AREA
selCountry.change(() => {
    const selCountryValue = selCountry.val()
    if (selCountryValue != 0){
        const areaData = getData('../Pages/ajax/register.php', 'area', {'country_id': selCountryValue})
        selArea.empty()
        selArea.append('<option value=0>選擇區域</option>')
        for (let i = 0; i < areaData.length; i++){
            selArea.append(`
                <option value=${areaData[i]['id']}>${areaData[i]['name']}</option>
            `)
        }
    }
})

// BTN SUBMIT CLICK
$('#btn_submit').click(() => {
    var account = $('input[name="account"]').val();
    var pwd = $('input[name="pwd"]').val();
    var pwdChecked = $('input[name="pwd_checked"]').val();
    var pharmacyName = $('input[name="pharmacy_name"]').val();
    var addressCountry = $('select[name="address1"]').find("option:selected").text();
    var addressArea = $('select[name="address2"]').find("option:selected").text();
    var addressDetail = $('input[name="address3"]').val();
    var contactName = $('input[name="contact_name"]').val();
    var phone = $('input[name="phone"]').val();
    var mail = $('input[name="mail"]').val();
    var medicalInstitutionCode = $('input[name="medical_institution_code"]').val();
    var medicalInstitutionCate = $('select[name="medical_institution_cate"]').find("option:selected").text();

    if (pwd != pwdChecked){
        alert('密碼不相符，請重新確認');
        $('input[name="pwd"]').val('');
        $('input[name="pwd_checked"]').val('');
    }else if (
        account != '' && pwd != '' && pharmacyName !='' &&
        addressCountry != '' && addressArea != '' && contactName !='' && 
        phone != '' && mail != '' && medicalInstitutionCode !='' && medicalInstitutionCate != ''
    ){
        var member_data = {
            account: account,
            pwd: pwd,
            pwdChecked: pwdChecked,
            pharmacyName: pharmacyName,
            addressCountry: addressCountry,
            addressArea: addressArea,
            addressDetail: addressDetail,
            contactName: contactName,
            phone: phone,
            mail: mail,
            medicalInstitutionCode: medicalInstitutionCode,
            medicalInstitutionCate: medicalInstitutionCate
        }
        submit(member_data);
    }else{
        alert('請確認資料填寫無誤')
    }
})

// BTN CLEAR CLICK 
$('#btn_clear').click(() => {
    init()
})

function init(){
    $('input[name="account"]').val('');
    $('input[name="pwd"]').val('');
    $('input[name="pwd_checked"]').val('');
    $('input[name="pharmacy_name"]').val('');
    $('input[name="address3"]').val('');
    $('input[name="contact_name"]').val('');
    $('input[name="phone"]').val('');
    $('input[name="mail"]').val('');
    $('input[name="medical_institution_code"]').val('');
    $('select[name="medical_institution_cate"]').val('0');
    $('select[name="address1"]').val('0');
    $('select[name="address2"]').val('0');
}

// GET DATA
function getDataInit(url, action){
    let returnData
    $.ajax({
        type: "POST",
        url: `${url}?action=${action}`,
        dataType: "JSON",
        async: false,
        success: function (response) {
            if (response.success) returnData = response.data
        }, error: () => {
            alert('ERROR');
        }
    });
    return returnData
}

// CREATE ACCOUNT
const submit = (member_data) => {
    $.ajax({
        type: "POST",
        url: "./ajax/register.php?action=submit",
        data: member_data,
        dataType: "JSON",
        success: function (response) {
            if (response.success) {
                alert('註冊完成，即將幫你導至登入頁');
                location.href = './login.php';
            }else{
                alert(response.msg);
            }
        }
    });
}

// import { register } from "../test/RegisterTest.js";
// register()
import { getDataNoInput, getData } from "./tools_ajax.js";

// 取得會員資料
const memberData = getDataNoInput(ajax_url, 'member')
// console.log(memberData);

// GET COUNTRY DATA
let countryData = getDataNoInput('../Pages/ajax/register.php', 'country');

// RENDER COUNTRY DATA
const selCountry = $('select[name="address1"]')
const selArea = $('select[name="address2"]')
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
        renderArea(selCountryValue)
    }
})

// 顯示在頁面
const inputContactName = $('input[name="contact_name"]')
const inputPhone = $('input[name="phone"]')
const inputMail = $('input[name="mail"]')
const selAddress1 = $('select[name="address1"]')
const selAddress2 = $('select[name="address2"]')
const inputAddress3 = $('input[name="address3"]')
const inputPwd = $('input[name="pwd"]')
const inputPwdChecked = $('input[name="pwd_checked"]')
const inputPharmacy = $('input[name="pharmacy_name"]')
const inputMICode = $('input[name="medical_institution_code"]')
const selMICate = $('#medical_institution_cate')
inputContactName.val(memberData.user_name)  // 聯絡人
inputContactName.prop('disabled', true);
inputPhone.val(memberData.phone)            // 電話
inputMail.val(memberData.mail)              // 信箱
selAddress1.val(countryNameToId(memberData.address_country))    // 地址1
renderArea(countryNameToId(memberData.address_country))         // 重新渲染一次區域
selAddress2.val(areaNameToId(memberData.address_area))          // 地址2
inputAddress3.val(memberData.address_detail)                    // 地址3
inputPharmacy.val(memberData.medical_institution_name)          // 藥局名稱
inputMICode.val(memberData.medical_institution_code)            // 藥局代碼
selMICate.val(memberData.medical_institution_cate)              // 藥局種類

// 比對資料(確認是否有編輯)
$('#btn_submit').click(() => {
    let isUpdate = 0
    let updateObj = {}
    if (inputPhone.val() != memberData.phone){
        isUpdate = 1
        updateObj['phone'] = inputPhone.val()
    }
    if (inputMail.val() != memberData.mail){
        isUpdate = 1
        updateObj['mail'] = inputMail.val()
    }
    if (selAddress1.val() != countryNameToId(memberData.address_country)){
        isUpdate = 1
        updateObj['address_country'] = selAddress1.val()
    }
    if (selAddress2.val() != areaNameToId(memberData.address_area)){
        isUpdate = 1
        updateObj['address_area'] = selAddress2.val()
    }
    if (inputAddress3.val() != memberData.address_detail){
        isUpdate = 1
        updateObj['address_detail'] = inputAddress3.val()
    }
    if (inputPharmacy.val() != memberData.medical_institution_name){
        isUpdate = 1
        updateObj['medical_institution_name'] = inputPharmacy.val()
    }
    if (inputMICode.val() != memberData.medical_institution_code){
        isUpdate = 1
        updateObj['medical_institution_code'] = inputMICode.val()
    }
    if (selMICate.val() != memberData.medical_institution_cate){
        isUpdate = 1
        updateObj['medical_institution_cate'] = selMICate.val()
    }
    if (inputPwd.val() != '' && inputPwd.val() == inputPwdChecked.val()){
        isUpdate = 1
        updateObj['password'] = inputPwd.val()
    }

    if (isUpdate == 1){
        // console.log(JSON.stringify(updateObj));
        $('#mask').toggleClass('hidden block')
        $('#notify').toggleClass('hidden flex')
        $('#pwd_check').focus()

        $('#btn_send').click(() => {
            const pwdCheck = $('#pwd_check').val()
            if (pwdCheck == ''){
                alert('請輸入密碼')
            }else{
                updateObj['pwd_check'] = pwdCheck
                const result = getData(ajax_url, 'update_data', updateObj)     // js物件傳至後端PHP可直接用$_POST接收資料
                if (result == true){
                    alert('資料更新完畢!')
                    history.go(0)
                }
            }
        })
    }else{
        alert('請選擇要變更的欄位')
    }
})

$('#mask').click(() => {
    history.go(0)
})



// 城市名字轉成Id
function countryNameToId(countryName){
    return getData(ajax_url, 'countryConvert', {countryName: countryName})
}
// 區域名字轉成Id
function areaNameToId(areaName){
    return getData(ajax_url, 'areaConvert', {areaName: areaName})
}

// 載入區域資料
function renderArea(selCountryValue){
    const areaData = getData('../Pages/ajax/register.php', 'area', {'country_id': selCountryValue})
    const selArea = $('select[name="address2"]')
    selArea.empty().append('<option value=0>選擇區域</option>')
    for (let i = 0; i < areaData.length; i++){
        selArea.append(`<option value=${areaData[i]['id']}>${areaData[i]['name']}</option>`)
    }
}
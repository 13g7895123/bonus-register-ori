export const register = () => {
    $('#btn_group').append(`
        <div id='btn_test' class='btn px-5 py-1 rounded-md text-black hover:text-slate-700 bg-blue-100 hover:bg-blue-300'>測試</div>
    `)
    $('#btn_test').click(() => {
        testUse()
    })
}

const testUse = () => {
    const country = Math.floor(Math.random() * 22) + 1
    const area = Math.floor(Math.random() * 3) + 1
    $('#address1').val(16);
    console.log(country);
    $('select[name="address2"]').val(country);
    $(':input').val(randemCode());
}

const randemCode = () => {

    // 預設折扣碼為5碼
    var code_count = 7;

    // 取得隨機字串
    var random_str = Math.random().toString(36).substring(2, (code_count + 2)).toUpperCase();

    // 不足折扣碼長度則補齊
    if (random_str.length < code_count) {
        for (i = 0; i < (5 - random_str.length); i++) {
            random_str += Math.random().substring(2, 3);
        }
    }

    // 如果有英文O改為1
    if (random_str.indexOf('O') != -1) {
        random_str = random_str.replace('O', '1');
    }

    return random_str
}
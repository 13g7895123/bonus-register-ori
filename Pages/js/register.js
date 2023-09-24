
const phoneUrl = `?page=phone&sn=${serverName}`   // 手機驗證網址

$('#btn-cancel-register').click(() => {
    $(location).attr('href', registerUrl);
})
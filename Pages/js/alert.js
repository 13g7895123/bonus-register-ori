let stayTime = 2

showAlert

const showAlert = setTimeout(() => {
    $('.alert_box').css('display', 'flex')
}, 500)

const hideAlert = setTimeout(() => {
    $('.alert_box').css('display', 'none')
}, 500)
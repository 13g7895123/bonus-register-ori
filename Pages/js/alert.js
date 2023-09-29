function openAlert(data){
    data.type = (typeof(data.type) == 'undefined') ? 'error' : 'success'
    data.title = (typeof(data.title) == 'undefined') ? '系統提示' : data.title
    data.text = (typeof(data.text) == 'undefined') ? '' : data.text
    data.delay = (typeof(data.delay) == 'undefined') ? 1.5 : data.delay

    $('#alert_img').attr('src', `../assets/images/${data.type}.png`)
    $('#alert_title').text(data.title)
    $('#alert_text').text(data.text)

    $('.alert_box').css('visibility', 'visible')
    $('.alert_box').css('transform', 'translate(-50%, -50%) scale(1.1)')

    autoCloseAlert(data.delay)  // 關閉視窗
}
function autoCloseAlert(second){
    setTimeout(() => {
        $('.alert_box').css('transform', 'translate(-50%, -50%) scale(0.1)')
        $('.alert_box').css('visibility', 'hidden')
    }, second*1000)
}
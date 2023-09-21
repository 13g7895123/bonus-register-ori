// $('#bg').css('background');
url_param()

const url_param = () => {
    const urlParams = new URLSearchParams(window.location.search);
    const sid = urlParams.get('sid')
    console.log(sid);
}

const get_server_name = (data) => {
    
}

const api = (data) => {
    $.ajax({
        type: "post",
        url: "url",
        data: data,
        dataType: "dataType",
        success: function (response) {
            
        }
    });
}
export const getData = (url, action, data) => {
    let returnData;
    $.ajax({
        type: "POST",
        url: url + '?action=' + action,
        data: data,
        dataType: "JSON",
        async: false,
        success: function (data) {
            // console.log(data);
            if (data.success) {
                returnData = data.data;
            } else {
                alert(data.msg);
            }
        }, error: function () {
            alert("獲取資料失敗");
        }
    });
    return returnData;
}

export const getDataNoInput = (url, action) => {
    let returnData;
    $.ajax({
        type: "POST",
        url: url + '?action=' + action,
        dataType: "JSON",
        async: false,
        success: function (data) {
            // console.log(data);
            if (data.success) {
                returnData = data.data;
            } else {
                alert(data.msg);
            }
        }, error: function () {
            alert("獲取資料失敗");
        }
    });
    return returnData;
}

<?php
// 引入
include_once(__DIR__ . '/__Class/ClassLoad.php');

// 檢查是否登入
// BasicWork::login_check('mi_id', './Pages/login.php');

// ajax安全性驗證:產生token
// $_SESSION['form_token'] = Form_token_Core::grante_token();

//指定頁面
$NOW_Page = 'phone'; //預設頁面
//檢查PageName參數與檔案是否存在
if (BaseWork::_get('page') != "" && file_exists('Pages/' . BaseWork::_get('page') . '.php')) {
    $NOW_Page = BaseWork::_get('page'); //帶入目前PageName
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>帳號申請</title>

    <link href='./dist/output.css' rel='stylesheet'> 
    <link rel="stylesheet" href="./assets/plugin/select2.min.css" />
    <!-- 9/24 新增 Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
    <!-- <link rel="stylesheet" href="BeAlert.css"> -->
</head>
<body class='h-[100vh] relative bg-slate-800 p-0'>
    <!-- <div class='h-full relative flex flex-col justify-center'> -->
        <!-- <div id='mask' class='w-full h-full hidden bg-slate-800 opacity-30 absolute top-0 z-20'></div> -->
        <!-- 顯示畫面 -->
        <?php include('Pages/' . $NOW_Page . '.php'); ?>    
    <!-- </div> -->
    <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="./assets/plugin/select2.min.js"></script>
    <script>
        const ajax_url = "<?php if ($NOW_Page) echo './Pages/ajax/' . $NOW_Page . '.php'; ?>";
        // const ajax_token = "<?php echo $_SESSION['Server_token']; ?>"
    </script>
    <script type='module' src='./Pages/js/<?php echo $NOW_Page ?>.js'></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/d804364582.js" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- sweet alert -->
    <script src="./assets/plugin/sweetAlert/sweetalert2.all.min.js"></script>
    <!-- <script src="./assets/plugin/beAlert/jquery-3.1.1.min.js"></script> -->
    <!-- <script src="BeAlert.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</body>
</html>
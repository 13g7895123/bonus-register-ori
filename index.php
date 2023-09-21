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
</head>
<body class='h-[100dvh] relative bg-slate-800'>
<!-- <body class='relative bg-contentBgBlue bg-opacity-95'> -->
    <!-- NAV -->
    <!-- <div class='w-full h-16 bg-green-100 py-3 flex justify-evenly'>
        <div class='w-[1280px] flex justify-between'>
            <div class='nav_top bg-green-100 flex'>
                <img src='./assets/images/logo.png' class='w-12 h-12'>
                <a class='text-2xl flex justify-center whitespace-nowrap tracking-5'>藥局滯銷健保藥品互換平台</a>                   
            </div>
            <div class='nav pr-3 w-full justify-end'> 
                <a href='?page=table_query_sales' class='nav_item relative group'>
                    <span class='whitespace-nowrap absolute left-1/2 -translate-x-1/2 tracking-6 animate-1 group-hover:border-b-2 group-hover:border-slate-500'>拍賣列表</span>
                </a>
                <a href='?page=table_add_sales' class='nav_item relative group'>
                    <span class='whitespace-nowrap absolute left-1/2 -translate-x-1/2 tracking-6 animate-1 group-hover:border-b-2 group-hover:border-slate-500'>新增拍賣</span>
                </a>
                <a href='?page=member_center' class='nav_item relative group'>
                    <span class='whitespace-nowrap absolute left-1/2 -translate-x-1/2 tracking-6 animate-1 group-hover:border-b-2 group-hover:border-slate-500'>會員中心</span>
                </a>
                <a href='./Pages/logout.php' class='mr-0 flex justify-end'>
                    <div class='py-1 px-3 border-2 border-black rounded-lg hover:bg-white hover:text-blue-600 hover:border-blue-600 cursor-pointer animate-3'>登出</div>
                </a>
            </div>
        </div>
    </div> -->
    <div class='h-[calc(100%-4rem)] pt-3 relative flex flex-col justify-center'>
        <div id='mask' class='w-full h-full hidden bg-slate-800 opacity-30 absolute top-0 z-20'></div>
        <!-- 顯示畫面 -->
        <?php include('Pages/' . $NOW_Page . '.php'); ?>    
    </div>
    <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="./assets/plugin/select2.min.js"></script>
    <script>
        const ajax_url = "<?php if ($NOW_Page) echo './Pages/ajax/' . $NOW_Page . '.php'; ?>";
        // const ajax_token = "<?php echo $_SESSION['Server_token']; ?>"
    </script>
    <script type='module' src='./Pages/js/<?php echo $NOW_Page ?>.js'></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/d804364582.js" crossorigin="anonymous"></script>
</body>
</html>
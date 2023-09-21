<?php

include_once(__DIR__ . '/../../__Class/ClassLoad.php');

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'submit':

            MYPDO::$table = 'member';
            MYPDO::$where = [
                'account' => $_POST['account'],
                'password' => hash('sha512', $_POST['password']),
                'switch' => 1
            ];
            $result = MYPDO::first();

            if (empty($result)){
                $return['success'] = false;
                $return['msg'] = '帳號密碼不存在，請重新確認!';
            }else{
                // 設置登入SESSION
                $_SESSION['mi_id'] = SYSAction::SQL_Data('member', 'account', $_POST['account'], 'id');
                $return['success'] = true;
            }

            echo json_encode($return);
            break;
    }
}

?>
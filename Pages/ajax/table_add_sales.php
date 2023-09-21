<?php

include_once(__DIR__ . '/../../__Class/ClassLoad.php');

// if (!isset($_GET['token']) || Form_token_Core::URIAuthcode($_GET['token'], 'DECODE', date("Ymd")) != $_SESSION['form_token']) {
//     exit();
// }

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'get_medicine_detail':

            $ajax_data = json_decode($_POST['data'], true);

            MYPDO::$table = 'medicine_items';
            MYPDO::$where = [
                'medicine_code' => $ajax_data['code']
            ];
            $result = MYPDO::first();

            if (!empty($result)){
                $return['success'] = true;
                $return['data'] = $result;
            }else{
                $return['success'] = false;
                $return['msg'] = '找不到該藥品，請重新確認健保碼';
            }

            echo json_encode($return);
            break;

        case 'submit':

            // 檢查登入狀態
            if(!isset($_SESSION['mi_id'])){
                $return['success'] = false;
                $return['msg'] = 'SESSION過期，請重新登入後再操作';
                
                echo json_encode($return);
                break;
            }

            $ajax_data = json_decode($_POST['data'], true);

            // 取得要存入的DATA
            $medicine_id = SYSAction::SQL_Data('medicine_items', 'medicine_code', $ajax_data['medicine_code'], 'id');

            MYPDO::$table = 'transaction';
            MYPDO::$data = [
                'member_id' => $_SESSION['mi_id'],
                'medicine_id' => $medicine_id,
                'sale_number' => $ajax_data['sale_number'],
                'sale_price' => $ajax_data['sale_price'],
                'expiry_date' => $ajax_data['expiry_date'],
                'transaction_type' => 1
            ];
            $insert_code = MYPDO::insert();

            $return['test'] = $_SESSION['mi_id'];

            if ($insert_code > 0){
                $return['success'] = true;
                $return['data'] = $insert_code;
                $return['test'] = $_SESSION['mi_id'];
            }else{
                $return['success'] = false;
                $return['msg'] = '寫入資料庫失敗';
            }            
            
            echo json_encode($return);
            break;

        case 'delete':
            $ajax_data = json_decode($_POST['data'], true);

            MYPDO::$table = 'transaction';
            MYPDO::$where = ['id' => $ajax_data['id']];
            MYPDO::del();

            $return['success'] = true;

            echo json_encode($return);
            break;
    }
}

?>
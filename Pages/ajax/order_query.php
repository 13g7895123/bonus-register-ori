<?php

include_once(__DIR__ . '/../../__Class/ClassLoad.php');

if (isset($_GET['action'])){
    switch($_GET['action']){
        case 'sales_data':
            
            MYPDO::$table = 'transaction';
            MYPDO::$join = [
                'medicine_items' => ['transaction.medicine_id', 'medicine_items.id'],
                'member' => ['transaction.member_id', 'member.id']
            ];
            MYPDO::$where = ['member_id' => $_SESSION['mi_id']];     // member_id
            $results = MYPDO::select();

            if (!empty($results)){
                $return['success'] = true;
                $return['data'] = $results;
            }else{
                $return['success'] = false;
                $return['msg'] = '查無該使用者交易紀錄';
            }

            echo json_encode($return);
            break;
    }
}

?>
<?php

include_once(__DIR__ . '/../../__Class/ClassLoad.php');

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'medicineCode':

            MYPDO::$table = 'medicine_items';
            MYPDO::$field = ['id', 'medicine_code'];
            $results = MYPDO::select();

            if (!empty($results)){
                $return['success'] = true;
                $return['data'] = $results;
            }else{
                $return['success'] = false;
            }

            echo json_encode($return);
            break;
    }
}

?>
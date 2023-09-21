<?php

include_once(__DIR__ . '/../../__Class/ClassLoad.php');

if (isset($_GET['action'])){
    switch($_GET['action']){
        case 'member':
            MYPDO::$table = 'member';
            MYPDO::$where = ['id' => $_SESSION['mi_id']];
            $results = MYPDO::select();

            if (!empty($results)){
                if (count($results) == 1){
                    $return['success'] = true;
                    // 把密碼取消
                    foreach ($results[0] as $key => $value){
                        if ($key !== 'password'){
                            $return['data'][$key] = $value;
                        }
                    }
                }else{
                    $return['success'] = false;
                    $return['msg'] = '使用者資料數量有誤';
                }
            }else {
                $return['success'] = false;
                $return['msg'] = '查無該使用者資料';
            }

            echo json_encode($return);
            return;
            break;
        case 'countryConvert':
            MYPDO::$table = 'address_country';
            MYPDO::$where = ['name' => $_POST['countryName']];
            $result = MYPDO::first();

            if(!empty($result)){
                $return['success'] = true;
                $return['data'] = $result['id'];
            }else{
                $return['success'] = false;
                $return['msg'] = '查無此城市資料';
            }

            echo json_encode($return);
            break;
        case 'areaConvert':
            MYPDO::$table = 'address_area';
            MYPDO::$where = ['name' => $_POST['areaName']];
            $result = MYPDO::first();

            if(!empty($result)){
                $return['success'] = true;
                $return['data'] = $result['id'];
            }else{
                $return['success'] = false;
                $return['msg'] = '查無此城市資料';
            }

            echo json_encode($return);
            break;
        case 'update_data':
            if(isset($_POST['pwd_check'])){
                MYPDO::$table = 'member';
                MYPDO::$where = [
                    'id' => $_SESSION['mi_id'],
                    'password' => hash('sha512', $_POST['pwd_check'])
                ];
                $result = MYPDO::first();
                if (!empty($result)){   // User資料存在

                    $data_array = (array)$_POST;
                    
                    // 密碼要加密後才可更新
                    foreach ($data_array as $key => $value){
                        if ($key == 'password'){
                            $data_array[$key] = hash('sha512', $value);
                        }
                    }

                    // 更新資料
                    unset($data_array['pwd_check']);    // 用於驗證身分
                    MYPDO::$table = 'member';
                    MYPDO::$data = $data_array;
                    MYPDO::$where = ['id' => $_SESSION['mi_id']];
                    $update_id = MYPDO::save();

                    if ($update_id > 0){
                        $return['success'] = true;
                        $return['data'] = true;
                    }else{
                        $return['success'] = false;
                        $return['msg'] = '更新資料錯誤'; 
                    }
                }else{
                    $return['success'] = false;
                    $return['msg'] = '無此用戶，請重新確認';
                }
            }else{
                $return['success'] = false;
                $return['msg'] = '未輸入密碼，無法變更資料';
            }

            // $return['test'] = hash('sha512', 'test');
            $return['test'] = $data_array;

            echo json_encode($return);
            break;
    }
}

?>
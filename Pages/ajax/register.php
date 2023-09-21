<?php

include_once(__DIR__ . '/../../__Class/ClassLoad.php');

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'country':
            MYPDO::$table = 'address_country';
            $results = MYPDO::select();

            $return['success'] = true;
            $return['data'] = $results;

            echo json_encode($return);
            break;

        case 'area':
            MYPDO::$table = 'address_area';
            MYPDO::$where = ['country_id' => $_POST['country_id']];
            $results = MYPDO::select();

            $return['success'] = true;
            $return['data'] = $results;
            
            echo json_encode($return);
            break;

        case 'submit':

            // CHECK ACCOUNT EXIST OR NOT
            MYPDO::$table = 'member';
            MYPDO::$where = [
                'account' => $_POST['account'],
                'switch' => 1
            ];
            $result = MYPDO::first();

            if (empty($result)){
                MYPDO::$table = 'member';
                MYPDO::$data = [
                    'account' => $_POST['account'],
                    'password' => hash('sha512', $_POST['pwd']),
                    'user_name' => $_POST['contactName'],
                    'phone' => $_POST['phone'],
                    'mail' => $_POST['mail'],
                    'address_country' => $_POST['addressCountry'],
                    'address_area' => $_POST['addressArea'],
                    'address_detail' => $_POST['addressDetail'],
                    'medical_institution_code' => $_POST['medicalInstitutionCode'],
                    'medical_institution_name' => $_POST['pharmacyName'],
                    'medical_institution_cate' => $_POST['medicalInstitutionCate']
                ];
                $insert_check = MYPDO::insert();

                if ($insert_check > 0){
                    $return['success'] = true;
                }else{
                    $return['success'] = false;
                    $return['msg'] = '寫入資料庫錯誤';
                }                
            }else{
                $return['success'] = false;
                $return['msg'] = '帳號已存在，請重新確認!';
            }

            echo json_encode($return);
            break;
    }
}

?>
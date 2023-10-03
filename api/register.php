<?php
include_once(__DIR__ . '/../__Class/ClassLoad.php');
include_once('./config.php');
include_once('./tools.php');
include('./common_class.php');

// 引入DB資訊
common::db_config();

if (isset($_GET['action'])){
    switch($_GET['action']){
        case 'register':
            // 取得 POST DATA
            // $json_data = file_get_contents('php://input');  // string
            // $post_data = json_decode($json_data, true);     // string轉array

            $post_data = $_POST;

            if (isset($post_data['phone'])){
                $phone = $post_data['phone'];
            }
            if (isset($post_data['account'])){
                $account = $post_data['account'];
            }
            if (isset($post_data['password'])){
                $password = $post_data['password'];
            }
            if (isset($post_data['birthday'])){
                $birthday = str_replace('-', '/', substr($post_data['birthday'], 0, 10));
            }
            if (isset($post_data['server'])){
                $server = $post_data['server'];
            }

            $verify_data['token'] = $post_data['token'];
            $verify_result = tools::velify_token($verify_data);

            if ($verify_result['success'] == true){
                if ($phone != '' && $account != '' && $password != '' && $birthday != ''){
                    MYPDO::$table = 'player_user';
                    MYPDO::$where = ['account' => $account];
                    $result = MYPDO::first();
    
                    if (!empty($result)){
                        $return['success'] = false;
                        $return['msg'] = '帳號已存在';
                    }else{
    
                        $server_id = SYSAction::SQL_Data('server', 'code_name', $server, 'id');
                        $server_name = SYSAction::SQL_Data('server', 'code_name', $server, 'name');
                        $max_num = SYSAction::SQL_Data('server', 'code_name', $server, 'max_num');

                        /* 驗證伺服器可註冊數量 */
                        MYPDO::$table = 'player_user';
                        MYPDO::$where = [
                            'id' => $server_id,
                            'phone' => $phone
                        ];
                        $results = MYPDO::select();
                        $now_num = count($results);

                        if ($now_num >= $max_num){
                            $return['success'] = false;
                            $return['msg'] = '超過可註冊數量';
                        }else{
                            MYPDO::$table = 'player_user';
                            MYPDO::$data = [
                                'account' => $account,
                                'password' => $password,
                                'phone' => $phone,
                                'birthday' => $birthday,
                                'server_id' => $server_id,
                                'server_name' => $server_name,
                                'server_code_name' => $server,
                                'switch' => 1,
                            ];
                            $insert_id = MYPDO::insert();
            
                            if ($insert_id > 0){
                                $return['success'] = true;
                                $return['msg'] = '註冊完成';
                                $return['birthday'] = $birthday;
                                $return['birthday_type'] = gettype($birthday);
                                $return['now_num'] = $now_num;
                                $return['max_num'] = $max_num;
                                $return['results'] = $results;
                            }else{
                                $return['success'] = false;
                                $return['msg'] = '資料寫入有誤，請重新確認';
                            }
                        }   /* End 驗證伺服器可註冊數量 */
                    }
                }else{
                    $return['success'] = false;
                    $return['msg'] = '輸入資料有誤，請重新確認';
                }
            }else{
                $return['success'] = false;
                $return['msg'] = $verify_result['msg'];
            }   /* End token verify */   

            echo json_encode($return);
            break;
    }
}





?>
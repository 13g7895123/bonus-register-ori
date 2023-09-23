<?php
include_once(__DIR__ . '/../__Class/ClassLoad.php');
include_once('config.php');
include_once('./tools.php');

// DB
MYPDO::$host = '139.162.15.125';
MYPDO::$port = '9901';
MYPDO::$db = 'register-db';
MYPDO::$user = 'register_user';
MYPDO::$pwd = '5mu8nd5m';

error_reporting(E_ERROR | E_PARSE);

if (isset($_GET['action'])){
    switch($_GET['action']){
        case 'server_name':
            // 取得 POST DATA
            /* vue版本
             * $json_data = file_get_contents('php://input');  // string
             * $post_data = json_decode($json_data, true);     // string轉array
             * End vue版本
             */ 
            $post_data = $_POST;

            if (isset($post_data['server'])){
                $server = $post_data['server'];
            }

            if ($server != ''){
                MYPDO::$table = 'server';
                MYPDO::$where = [
                    'code_name' => $server,
                ];
                $result = MYPDO::first();

                if (!empty($result)){
                    $return['success'] = true;
                    $return['data']['name'] = $result['name'];
                    $return['data']['bg'] = $result['bg_img_path'];
                }else{
                    $return['success'] = false;
                    $return['msg'] = '伺服器不存在';
                }

            }else{
                $return['success'] = false;
                $return['msg'] = '輸入資料有誤，請重新確認';
            }

            echo json_encode($return);
            break;
    }
}

?>
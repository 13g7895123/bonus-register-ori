<?php
class common
{
    // 資料庫設定
    public static function db_config()
    {
        MYPDO::$host = '139.162.15.125';
        MYPDO::$port = '9901';
        MYPDO::$db = 'register-db';
        MYPDO::$user = 'register_user';
        MYPDO::$pwd = '5mu8nd5m';
    }

    //
    public static function post_data()
    {
        // vue
        // $json_data = file_get_contents('php://input');  // string
        // $post_data = json_decode($json_data, true);     // string轉array
        
        // jquery
        $post_data = $_POST;

        return $post_data;
    }
}
?>
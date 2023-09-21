<?php

/**
 * 網站初始作業
 */
class BasicWork
{
    /**
     * 登入狀態驗證
     * @param str $session_name
     * @param str $login_path
     */
    public static function login_check($session_name, $login_path){
        session_start();
        if (!isset($_SESSION[$session_name])){
            header("location: $login_path");
        }
    }

    /**
     * 登出
     * @param str $login_path
     */
    public static function logout($login_path){
        session_start();
        session_destroy();
        header("location: $login_path");
    }
}
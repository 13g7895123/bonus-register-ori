<?php
include_once(__DIR__ . '/../__Class/ClassLoad.php');

error_reporting(E_ERROR | E_PARSE);

// DB
MYPDO::$host = '139.162.15.125';
// MYPDO::$host = '127.0.0.1';
MYPDO::$port = '3306';
MYPDO::$db = 'db_bonus_register';
MYPDO::$user = 'bonus_register_remote';
MYPDO::$pwd = '820820';

// CORS
// $url_arr = ['http://170.187.229.132:9055/'];
// $http_origin = $_SERVER['HTTP_ORIGIN'];

// if (in_array($http_origin, $url_arr)){
//     header("Access-Control-Allow-Origin: $http_origin");
// }

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Headers: Auth');

?>
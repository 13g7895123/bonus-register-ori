<?php
include_once(__DIR__ . '/../__Class/ClassLoad.php');

error_reporting(E_ERROR | E_PARSE);

// DB
MYPDO::$host = '139.162.15.125';
MYPDO::$port = '9901';
MYPDO::$db = 'register-db';
MYPDO::$user = 'register_user';
MYPDO::$pwd = '5mu8nd5m';

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
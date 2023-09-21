<?php
include_once(__DIR__ . '/../__Class/ClassLoad.php');
include_once(__DIR__ . './transactions.php');

header('Content-type:application/json;charset=utf-8');

ini_set('display_errors', '1');
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] !== 'GET' &&
    $_SERVER['REQUEST_METHOD'] !== 'POST' &&
    $_SERVER['REQUEST_METHOD'] !== 'PUT' &&
    $_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    header("HTTP/1.0 405 Method Not Allowed");
    die();
}

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo Response::getResponseData(false, 4, null);
    die();
}

if ($_SERVER["PHP_AUTH_USER"] !== AUTH_USER ||
    $_SERVER["PHP_AUTH_PW"] !== AUTH_PW) {
    echo Response::getResponseData(false, 4, null);
    die();
}

$action = (new Params())->get("action");

if (!isset($action)) {
    echo Response::getResponseData(false, 3, null);
    die();
}

switch ($action) {
    case "transactions":
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo Response::getResponseData(false, 2, null);
            break;
        }
        transactions();
        break;

    default:
        echo Response::getResponseData(false, 2, null);
        break;
}
?>
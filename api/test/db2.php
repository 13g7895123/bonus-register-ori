<?php

/* 測試用，串接第一個DB
 *
 * 
 */

include_once(__DIR__.'/../../__Class/ClassLoad.php');

MYPDO::$host = '139.162.15.125';
MYPDO::$port = '8096';
MYPDO::$db = 'test_db_2';
// MYPDO::$user = 'root';
// MYPDO::$pwd = 'termit0035';
MYPDO::$user = 'db_user_2';
MYPDO::$pwd = '8208202';

 MYPDO::$table = 'test2';
 MYPDO::$data = [
    'c1' => '3',
    'c2' => '3',
    'C3' => '3',
 ];
 $results = MYPDO::insert();

 echo json_encode($results);

?>
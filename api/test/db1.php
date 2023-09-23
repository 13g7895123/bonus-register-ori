<?php

/* 測試用，串接第一個DB
 *
 * 
 */

include_once(__DIR__.'/../../__Class/ClassLoad.php');

MYPDO::$host = '139.162.15.125';
MYPDO::$port = '8098';
MYPDO::$db = 'test_db';
// MYPDO::$user = 'root';
// MYPDO::$pwd = 'termit0035';
MYPDO::$user = 'db_user';
MYPDO::$pwd = '820820';

 MYPDO::$table = 'test1';
 MYPDO::$data = [
    'c1' => '3',
    'c2' => '3',
    'C3' => '3',
 ];
 $results = MYPDO::insert();

 echo json_encode($results);

?>
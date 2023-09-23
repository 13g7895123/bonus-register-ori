<?php

/* 測試用，串接第一個DB
 *
 * 
 */

include_once(__DIR__.'/../../__Class/ClassLoad.php');

MYPDO::$host = '139.162.15.125';
MYPDO::$port = '8098';
MYPDO::$db = 'test_db';
MYPDO::$user = 'root';
MYPDO::$pwd = 'termit0035';
// MYPDO::$user = 'db_user';
// MYPDO::$pwd = '820820';

 MYPDO::$table = 'test1';
 MYPDO::$data = [
    'c1' => '2',
    'c2' => '2',
    'c3' => '3',
 ];
 MYPDO::$where = ['id' => '1'];
 MYPDO::save();
//  $results = MYPDO::select();

 echo json_encode($results);

?>
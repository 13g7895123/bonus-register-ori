<?php

/* 測試用，串接第一個DB
 *
 * 
 */

 include_once(__DIR__.'/../../__Class/ClassLoad.php');

echo __DIR__.'/../../__Class/ClassLoad.php';
MYPDO::$host = '139.162.15.125';
echo  MYPDO::$host;
die();


//  MYPDO::$port = '8098';
//  MYPDO::$db = 'test_db';
//  MYPDO::$user = 'db_user';
//  MYPDO::$pwd = '820820';

//  MYPDO::$table = 'test1';
//  MYPDO::$data = [
//     'c1' => 1,
//     'c2' => 2,
//     '3' => 3,
//  ];
//  MYPDO::insert();

?>
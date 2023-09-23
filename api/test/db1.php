<?php

/* 測試用，串接第一個DB
 *
 * 
 */

 include_once('../../__Class/ClassLoad.php');

 die();

 MYPDO::$host = '139.162.15.125';
 MYPDO::$port = '8098';
 MYPDO::$db = 'test_db';
 MYPDO::$user = 'db_user';
 MYPDO::$pwd = '820820';

 MYPDO::$table = 'test1';
 MYPDO::$data = [
    'c1' => 1,
    'c2' => 2,
    '3' => 3,
 ];
 MYPDO::insert();

?>
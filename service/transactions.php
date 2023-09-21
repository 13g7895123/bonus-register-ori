<?php

include_once(__DIR__ . '/../__Class/ClassLoad.php');

function transactions(){

    // $params = new Params;

    MYPDO::$table = 'transaction';
    MYPDO::$join = [
        'medicine_items' => ['transaction.medicine_id', 'medicine_items.id']
    ];
    $results = MYPDO::select();

    if (!empty($results)){
        echo Response::getResponseData(true, 1, '123');
    }else{
        echo Response::getResponseData(false, 2, '');
    }

}

?>
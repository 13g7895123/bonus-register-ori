<?php

include_once(__DIR__ . '/../../__Class/ClassLoad.php');

// CORS
header("Access-Control-Allow-Origin: *");

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'sales_data':

            MYPDO::$table = 'transaction';
            MYPDO::$join = [
                'medicine_items' => ['transaction.medicine_id', 'medicine_items.id'],
                'member' => ['transaction.member_id', 'member.id']
            ];
            $results = MYPDO::select();

            if (!empty($results)){
                $return['success'] = true;
                $return['data'] = $results;
            }else{
                $return['success'] = false;
                $return['msg'] = '目前無資料!';
            }

            echo json_encode($return);
            break;

        case 'require_data':

            $ajax_data = json_decode($_POST['data'], true);

            $code = trim($ajax_data['code']);
            $chinese_name = trim($ajax_data['chinese_name']);
            $eng_name = trim($ajax_data['eng_name']);
            $ingredient = trim($ajax_data['ingredient']);

            // 組合WHERE QUERY -> 無法使用，會出現異常
            // $where_sql = [];
            // if ($code != '') $where_sql['medicine_code'] = ["%{$code}%", 'LIKE', 'or'];
            // if ($chinese_name != '') $where_sql['medicine_name'] = ["%{$chinese_name}%", 'LIKE', 'or'];
            // if ($eng_name != '') $where_sql['eng_name'] = ["%{$eng_name}%", 'LIKE', 'or'];
            // if ($ingredient != '') $where_sql['ingredient'] = ["%{$ingredient}%", 'LIKE', 'or'];

            // 組合WHERE QUERY
            $where_sql = '';
            $where_sql = combine_where($where_sql, 'medicine_code', $code);
            $where_sql = combine_where($where_sql, 'medicine_name', $chinese_name);
            $where_sql = combine_where($where_sql, 'eng_name', $eng_name);
            $where_sql = combine_where($where_sql, 'ingredient', $ingredient);

            MYPDO::$table = 'medicine_items';            
            MYPDO::$join = [
                'transaction' => ['transaction.medicine_id', 'medicine_items.id'],
                'member' => ['transaction.member_id', 'member.id']
            ];
            MYPDO::$where = $where_sql;
            $results = MYPDO::select();

            if (!empty($results)){
                $return['success'] = true;
                $return['data'] = $results;
            }else{
                $return['success'] = false;
                $return['data'] = null;
                $return['msg'] = '目前無資料!';
            }
            $return['test'] = $where_sql;

            echo json_encode($return);
            break;
    }
}

// 組成WHERE語法
function combine_where($whereSql, $colName, $value){
    if ($value != ''){
        if ($whereSql != '') $whereSql .= " OR ";
        $whereSql .= "$colName LIKE '%$value%'";
    }
    return $whereSql;
}

?>
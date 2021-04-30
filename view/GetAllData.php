<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Method: GET');

 include '../controller/Data.php';
 include '../model/database.php';

$connect_obj = new Content($conn);
$array_result = $connect_obj->getAllContent();
// $result_array = [];

if($array_result){
    if(connection_status() == CONNECTION_ABORTED){
        echo 'network challenge';
    }else{
    //fetch all data in assoc array 
    $row = $array_result->fetchAll(PDO::FETCH_ASSOC);
    print_r($row);
    }
  
}else{
    echo array('message'=> 'No result');
}


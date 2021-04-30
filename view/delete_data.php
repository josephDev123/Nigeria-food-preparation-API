<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: DELETE');

include '../controller/Data.php';
include '../model/database.php';

//Classes
$delete_obj = new Content($conn);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_obj->id = $id;
    
    if ($delete_obj->delete()) {
       http_response_code(200);
       echo json_encode(array('message'=>'Data is successfully deleted'));
    }else{
        http_response_code(503);
        echo json_encode(array('message'=>'Data fails to delete. it may due to network challenge'));
    }
}else{
    http_response_code(400);
    echo json_encode(array('message'=>'Bad request. it could not be delete due to parameter not passed'));
}
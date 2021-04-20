<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Method: GET');

include '../classes/Data.php';
include '../database_config/database.php';

$content_obj = new Content($conn);
if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    print_r($content_obj->getDataById($id)) ;
}else{
    print_r(array('message'=> 'No "id" parameter was passed to the query URL'));
}
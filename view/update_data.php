<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');

include '../controller/Data.php';
include '../model/database.php';

// updated data
$updated_data = json_decode(file_get_contents("php://input"));
$post_obj = new Content($conn);
//id to be updated
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if(isset($updated_data->food_name) && isset($updated_data->food_introduction) && isset($updated_data->food_procedure) && isset($updated_data->food_ingredient) && isset($updated_data->food_image) && isset($updated_data->food_equipment) ){

       $post_obj->food_name = $updated_data->food_name;
       $post_obj->food_introduction = $updated_data->food_introduction;
       $post_obj->food_procedure = $updated_data->food_procedure;
       $post_obj->food_ingredient = $updated_data->food_ingredient;
       $post_obj->food_image = $updated_data->food_image;
       $post_obj->food_equipment = $updated_data->food_equipment;

       if($post_obj->update($id)){
        echo json_encode(array('message'=>'String/data updated successfully')); 
       }
    }else{
        echo json_encode(array('message'=>'No string/data passed for update'));
    }
    
}else{
    echo json_encode(array('message'=>'specific query ID to update was not specified'));
}
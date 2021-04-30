<?php

header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Method: POST');

 include '../controller/Data.php';
 include '../model/database.php';

$post_obj = new Content($conn);

// get posted data
$create_data = json_decode(file_get_contents("php://input"));

if (!empty($create_data->food_name) && !empty($create_data->food_introduction) && !empty($create_data->food_procedure) && !empty($create_data->food_ingredient) && !empty($create_data->food_image) && !empty($create_data->food_equipment) ) {
    
   $post_obj->food_name = $create_data->food_name;
   $post_obj->food_introduction = $create_data->food_introduction;
   $post_obj->food_procedure = $create_data->food_procedure;
   $post_obj->food_ingredient = $create_data->food_ingredient;
   $post_obj->food_image = $create_data->food_image;
   $post_obj->food_equipment = $create_data->food_equipment;

   if($post_obj->post_data()){
      // set response code - 201 created
      http_response_code(201);
  
      // tell the user
      echo json_encode(array("message" => "data was created."));
   }else{
       // set response code - 503 service unavailable
       http_response_code(503);
  
       // tell the user
       echo json_encode(array("message" => "Unable to create data."));
   }
}else{
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create data. Data is incomplete."));
}



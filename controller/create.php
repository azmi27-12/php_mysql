<?php

//headers

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

include_once '../config/config.php';
include_once '../models/collection.php';

$database = new Database();
$db = $database->getConnection();

$collection = new Collection($db);
$data = json_decode(file_get_contents('php://input'));

if(
    !empty($data->type_) &&
    !empty($data->day_) &&
    !empty($data->hour) 
){
    $collection->type_ = $data->type_;
    $collection->day_ = $data->day_;
    $collection->hour = $data->hour;

    if($collection->create()){
        http_response_code(201);
        echo json_encode(array('message' => 'collection inserted correctly '));
    }else{
        http_response_code(501);
        echo json_encode(array('message' => 'impossible insert collection'));
    }

}else{
    http_response_code(400);
    echo json_encode(array('message ' => 'incomplete data, impossible insert data'));
}

?>
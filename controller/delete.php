<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/config.php';
include_once '../models/collection.php';

$database = new Database();
$db = $database->getConnection();

$collection = new Collection($db);

$data = json_decode(file_get_contents('php://input'));

$collection -> type_ = $data->type_;

if($collection->delete()){
    http_response_code(200);
    echo json_encode(array('message' => 'deleted'));

}else{
    http_response_code(503);
    echo json_encode(array('message' => 'impossible delete collection'));
}
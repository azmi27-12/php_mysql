<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

//include database and models

include_once '../config/config.php';
include_once '../models/collection.php';

//create database object and connect to database

$database = new Database();
$db = $database->getConnection();

//new object collection

$collection = new Collection($db);

//query 
$stmt = $collection->read();
$num = $stmt->rowCount();

if($num>0){
    $collection_arr = array();
    $collection_arr['data'] = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $collection_item = array(
            'type_' => $type_,
            'day_' => $day_,
            'hour' => $hour
        );
         array_push($collection_arr['data'], $collection_item);
    }
    echo json_encode($collection_arr);
}else{
    echo json_encode(
        array('message' => 'nothing to show')
    );
}

?>
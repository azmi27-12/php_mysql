<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "../config/config.php";
include_once "../models/collection.php";

//db and connect
$database = new Database();
$db = $database->getConnection();

$collection = new Collection($db);

//get date
$collection->day_ = strtolower(date('l'));

$result = $collection->read_day();
$num = $result->rowCount();

// Check if there is any 
if($num > 0) {

  $collection_arr = array();
  

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $collection_item = array(
      'type_' => $type_,
      'day_' => $day_,
      'hour' => $hour
     
    );

    // Push to "data"
    array_push($collection_arr, $collection_item);
    
  }

  // Turn to JSON & output
  echo json_encode($collection_arr);

} else {

  echo json_encode(
    array('message' => 'nothing to take out')
  );
}
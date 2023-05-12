<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../database.php';
include_once '../../card_id.php';

$database = new Database();
$db = $database->getConnection();
$item = new CardID($db);

// $json = file_get_contents('php://input');
// $data = json_decode($json);

// $data->card_id;

// $item->card_id = $data->card_id;

$item->card_id = isset($_GET['card_id']) ? $_GET['card_id'] : die();


if($item->createCardID()){
echo json_encode(array( 
     "status" => 201, 
     "message" => "Saved successfully."
 ));
} else{
echo json_encode(array( 
     "status" => 401, 
     "message" => "Someting went wrong"
 ));
}
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../database.php';
include_once '../../users.php';
$database = new Database();
$db = $database->getConnection();
$item = new users_tbl($db);

$json = file_get_contents('php://input');
$data = json_decode($json);

// echo $data->name;

$item->card_id = $data->card_id;
$item->name = $data->name;
$item->email = $data->email;
$item->mobile = $data->mobile;
if ($item->createUser()) {
     echo json_encode(array("status" => 201, "message" => "Saved successfully."));
} else {
     echo json_encode(array("status" => 404, "message" => "No record found."));
}
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../workers.php';
$database = new Database();
$db = $database->getConnection();
$item = new Worker($db);

$json = file_get_contents('php://input');
$data = json_decode($json);

// echo $data->name;

$item->file_name = $data->file_name;
$item->message = $data->message;
$item->created = date('Y-m-d H:i:s');
if($item->createEmployee()){
echo json_encode("Saved successfully.");
} else{
echo json_encode("Someting went wrong");
}
?>
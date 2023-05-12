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
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->getSingleEmployee();
if($item->file_name != null){

// create array
$worker_arr = array(
"id" => $item->id,
"name" => $item->file_name,
"email" => $item->message,
"created" => $item->created
);

http_response_code(200);
echo json_encode($worker_arr);
}
else{
http_response_code(404);
echo json_encode("Details not found");
}
?>
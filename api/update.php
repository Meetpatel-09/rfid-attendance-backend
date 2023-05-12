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
$item->file_name = $_GET['file_name'];
$item->message = $_GET['message'];
$item->created = date('Y-m-d H:i:s');
if($item->updateEmployee()){
echo json_encode("Updated successfully.");
} else{
echo json_encode("Someting went wrong");
}
?>
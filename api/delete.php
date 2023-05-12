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

if($item->deleteEmployee()){
     echo json_encode("Deleted successfully.");
} else{
echo json_encode("Someting went wrong");
}
?>
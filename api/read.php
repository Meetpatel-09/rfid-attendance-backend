<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../workers.php';
$database = new Database();

$db = $database->getConnection();
$items = new Worker($db);
$records = $items->getEmployees();
$itemCount = $records->num_rows;
echo json_encode($itemCount);
if($itemCount > 0){
$worrkerArr = array();
$worrkerArr["body"] = array();
$worrkerArr["itemCount"] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($worrkerArr["body"], $row);
}
echo json_encode($worrkerArr);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>
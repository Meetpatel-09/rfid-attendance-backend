<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../../database.php';
include_once '../../users.php';
$database = new Database();
     
$db = $database->getConnection();
$items = new users_tbl($db);
$records = $items->getusers_tbl();
$itemCount = $records->num_rows;
// echo json_encode($itemCount);
if ($itemCount > 0) {
     $cardIdArr = array();
     $cardIdArr["status"] = 201;
     $cardIdArr["message"] = "Data Found";
     $cardIdArr["body"] = array();
     $cardIdArr["itemCount"] = $itemCount;
     while ($row = $records->fetch_assoc()) {
          array_push($cardIdArr["body"], $row);
     }
     echo json_encode($cardIdArr);
} else {
     http_response_code(404);
     echo json_encode(
          array("status" => 404, "message" => "No record found.")
     );
}
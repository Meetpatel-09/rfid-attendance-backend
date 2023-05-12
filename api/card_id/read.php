<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../../database.php';
include_once '../../card_id.php';
$database = new Database();

$db = $database->getConnection();
$items = new CardID($db);
$records = $items->getCardID();
$itemCount = $records->num_rows;
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
     http_response_code(200);
     echo json_encode(
          array("status" => 404, "message" => "No record found.")
     );
}
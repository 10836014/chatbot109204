<?php
// required headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

// include database and object files
include_once '../config/database.php';
include_once '../object/chatroom.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$chatroom = new Chatroom($db);

// query products
$stmt = $chatroom->selectChatroomID();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    echo json_encode(['message' => 'Yes']);
} else {
    echo json_encode(['message' => 'No']);
}
mysqli_close($chatroom);
?>

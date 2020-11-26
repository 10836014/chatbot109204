<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../object/chatroom.php';
    
    // instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();
    
    // initialize object
    $chatroom = new Chatroom($db);
    
    // query products
    //---呼叫的function記得改---
    $stmt = $chatroom->getHabbitName();
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if ($num>0) {
        $user_item=array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
    
            $user_item=array(
                "habbit_name" => $habbit_name
            );
        }
        echo json_encode($user_item);
    } else {
        echo json_encode(
            array("message" => "請傳入正確的chatroom_id")
        );
        // mysqli_close($user);
    }

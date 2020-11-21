<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../object/user.php';
    
    // instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();
    
    // initialize object
    $user = new User($db);
    
    // query products
    //---呼叫的function記得改---
    $stmt = $user->getUserName();
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if ($num>0) {
        $user_item=array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
    
            $user_item=array(
                "user_id" => $user_id,
                "user_name" => $user_name
            );
        }
        echo json_encode($user_item);
    } else {
        echo json_encode(
            array("message" => "該使用者沒有養成中的習慣 habbit_status為養成中")
        );
        // mysqli_close($user);
    }

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
    $stmt = $chatroom->readCompletion();
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if($num>0){
    
        // products array
        $chatrooms_arr=array();
        $chatrooms_arr["records"]=array();
    
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);
    
            $chatroom_item=array(
                "user_id" => $user_id,
                "chatroom_id" => $chatroom_id,
                "habbit_status" =>$habbit_status,
                "completion" => $completion
            );

            array_push($chatrooms_arr["records"], $chatroom_item);
        }

        echo json_encode($chatrooms_arr);

    }
    
    else{
        echo json_encode(
            array("message" => "該使用者沒有養成中的習慣 habbit_status為養成中")
        );
        mysqli_close($chatroom);
    }
?>
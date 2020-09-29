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
    $chatrooms = new Chatroom($db);
    
    // query products
    $stmt = $chatrooms->readChatRoom();
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
                "chatroom_id" => $chatroom_id,
                "user_id" => $user_id,
                "nick_name" => $nick_name,
                "role_id" => $role_id,
                "role_name" => $role_name,
                "habbit_id" => $habbit_id,
                "habbit_name" => $habbit_name,
                "habbit_status" => $habbit_status, //進行中、暫停中
                "signed_times" => $signed_times,
                "original_intention" => $original_intention, //提醒時間 00:00:00
                "goodnees" => $goodnees, //完成次數 default=0
                "badnees" => $badnees,  //建立時間 timesteamps
                "created_at" => $created_at, //角色照片
                "updated_at" => $updated_at //習慣分類ID
            );

            array_push($chatrooms_arr["records"], $chatroom_item);
        }

        //不要顯示重複的值
        $chatrooms_arr=array_unique($chatrooms_arr);
        
        echo json_encode($chatrooms_arr);

    }
    
    else{
        echo json_encode(
            array("message" => "No chatrooms found.")
        );
        mysql_close($chatroom);
    }
?>
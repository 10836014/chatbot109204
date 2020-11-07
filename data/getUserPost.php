<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../object/post.php';
    
    // instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();
    
    // initialize object
    $chatrooms = new Post($db);
    
    // query products
    $stmt = $chatrooms->getUserPost();
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
                "post_id" => $post_id,
                "habbit_cat_name" => $habbit_cat_name,
                "user_id" => $user_id,
                "user_name" => $user_name,
                "content" => $content,
                "created_at" => $created_at,
                "updated_at" => $updated_at
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
        mysqli_close($chatroom);
    }
?>
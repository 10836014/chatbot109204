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
    // products array
    $chatrooms_arr = [];
    $chatrooms_arr['records'] = [];

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $chatroom_item = [
            'chatroom_id' => $chatroom_id,
            'user_id' => $user_id,
            'nick_name' => $nick_name,
            'role_id' => $role_id,
            'role_name' => $role_name,
            'role_photo' => 'http://140.131.114.140/chatbot109204/upload/'.$role_photo,
            // 'role_photo' => 'http://localhost/chatbot109204/upload/'.$role_photo,
            'habbit_id' => $habbit_id,
            'habbit_name' => $habbit_name,
            'habbit_status' => $habbit_status,
            'signed_time' => $signed_time,
            'completion' => $completion,
            'original_intention' => $original_intention,
            'goodness' => $goodness,
            'badness' => $badness,
            'days' => $days,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ];

        array_push($chatrooms_arr['records'], $chatroom_item);
    }

    //不要顯使重複的值
    //$chatrooms_arr=array_unique($chatrooms_arr);

    echo json_encode($chatrooms_arr);
} else {
    echo json_encode(['message' => 'No chatrooms found.']);
    // mysqli_close($chatroom);
}

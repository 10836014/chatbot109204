<?php
// required headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

// include database and object files
include_once '../config/database.php';
include_once '../object/post.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$chatrooms = new Post($db);

// query products
$stmt = $chatrooms->getHabbitPosts();
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
            'post_id' => $post_id,
            'habbit_id' => $habbit_id,
            'habbit_cat_name' => $habbit_cat_name,
            'user_id' => $user_id,
            'user_name' => $user_name,
            'content' => $content,
            'post_photo' => $post_photo,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
            'likesNum' => $likesNum,
        ];

        array_push($chatrooms_arr['records'], $chatroom_item);
    }

    //不要顯示重複的值
    $chatrooms_arr = array_unique($chatrooms_arr);

    echo json_encode($chatrooms_arr);
} else {
    echo json_encode(['message' => '該分類下沒有貼文，或是沒有此分類.']);
    // mysqli_close($chatroom);
}

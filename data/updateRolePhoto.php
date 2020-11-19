<?php

header('Content-Type: application/json; charset=UTF-8');
$con = mysqli_connect('localhost', 'root', '');

if (!$con) {
    die('Could not connect: ' . mysql_error());
    return json_encode(['result' => '1', 'data' => '伺服器連接失敗']);
}

$selected = mysqli_select_db($con, 'chatbot');
        
$sql="UPDATE chatrooms SET role_id='$_POST[role_id]' , role_name = '$_POST[role_name]', nick_name = '$_POST[nick_name]'
WHERE chatroom_id='$_POST[chatroom_id]'";


if (!mysqli_query($con, $sql)) {
    //die 'Error: ' . mysqli_error($con);
    echo json_encode([
        'result' => '1',
        'data' => '添加失敗',
        'error' => mysqli_error($con),
    ]);
} else {
    $chatroom_id = $con->insert_id;
    $con = new mysqli('localhost', 'root', '', 'chatbot');
    $chatroom_id = "$_POST[chatroom_id]";
    $targetDir = "C:/xampp/htdocs/chatbot109204/upload/"; //搬移路徑
    // $fileName = $chatroom_id . "_" . basename($_FILES["role_photo"]["name"]); //檔名
    $fileName = $chatroom_id . "_rolePhoto.jpg" ; //檔名
    $dest = $targetDir . $fileName;
    $filePath = $_FILES["role_photo"]["tmp_name"]; //暫存路徑
    $fileType = $_FILES["role_photo"]["type"];

    if (!empty($fileName)) {
        $allowTypes = array('image/jpg','image/png','image/jpeg','image/gif','image/pdf');
        if (file_exists('D:/xampp/htdocs/chatbot109204/upload/' . $fileName)) {
            echo json_encode(array('result' => '1', 'data' => '檔案已存在。', 'error' => mysqli_error($con)));
        } elseif (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($filePath, $dest)) {
                // Insert image file name into database
                $insert = $con->query("UPDATE chatrooms SET role_photo='".$fileName."'
                                    WHERE chatroom_id = $chatroom_id ");
    
                if ($insert) {
                    echo json_encode(array('result' => '0', 'data' => '添加成功', 'chatroom_id' => $chatroom_id));
                } else {
                    echo json_encode(array('result' => '1', 'data' => '添加失敗', 'error' => mysqli_error($con)));
                }
            }
        } else {
            // var_dump($fileType, $allowTypes);
            echo json_encode(array('result' => '1', 'data' => '只能存 JPG, JPEG, PNG, GIF, & PDF格式的照片', 'error' => mysqli_error($con)));
        }
    }
}

mysqli_close($con);

// if ($result !== 0) {
//     $chatroom_id = $con->insert_id;
//     $con = new mysqli('localhost', 'root', '', 'chatbot');
//     $chatroom_id = "$_POST[chatroom_id]";
//     $targetDir = "C:/xampp/htdocs/chatbot109204/upload/"; //搬移路徑
//     // $fileName = $chatroom_id . "_" . basename($_FILES["role_photo"]["name"]); //檔名
//     $fileName = $chatroom_id . "_rolePhoto.jpg" ; //檔名
//     $dest = $targetDir . $fileName;
//     $filePath = $_FILES["role_photo"]["tmp_name"]; //暫存路徑
//     $fileType = $_FILES["role_photo"]["type"];

//     if (!empty($fileName)) {
//         $allowTypes = array('image/jpg','image/png','image/jpeg','image/gif','image/pdf');
//         if (file_exists('D:/xampp/htdocs/chatbot109204/upload/' . $fileName)) {
//             echo json_encode(array('result' => '1', 'data' => '檔案已存在。', 'error' => mysqli_error($con)));
//         } elseif (in_array($fileType, $allowTypes)) {
//             // Upload file to server
//             if (move_uploaded_file($filePath, $dest)) {
//                 // Insert image file name into database
//                 $insert = $con->query("UPDATE chatrooms SET role_photo='".$fileName."'
//                                     WHERE chatroom_id = $chatroom_id ");
    
//                 if ($insert) {
//                     echo json_encode(array('result' => '0', 'data' => '添加成功', 'chatroom_id' => $chatroom_id, '修改到的數量' =>  $con -> affected_rows));
//                 } else {
//                     echo json_encode(array('result' => '1', 'data' => '添加失敗', 'error' => mysqli_error($con)));
//                 }
//             }
//         } else {
//             // var_dump($fileType, $allowTypes);
//             echo json_encode(array('result' => '1', 'data' => '只能存 JPG, JPEG, PNG, GIF, & PDF格式的照片', 'error' => mysqli_error($con)));
//         }
//     }
//     // echo json_encode(array('result' => '0',
//     // 'data' => "成功，修改到的資料數量 :" . $con -> affected_rows));
// } elseif ($result == 0) {
//     echo json_encode(array('result' => '1',
//     'data' => "失敗，修改到的資料數量為零 :" . $con -> affected_rows,
//     'message 1'=>'可能是修改資料相同，沒變更到',
//     'message 2'=>'或是查無此chatroom_id'));
// } elseif (!mysqli_query($con, $sql)) {
//     echo json_encode(array('result' => '1',
//     'data' => '添加失敗',
//     'error' => mysqli_error($con)));
// } elseif (!mysqli_query($con, $sql)) {
//     //die 'Error: ' . mysqli_error($con);
//     echo json_encode([
//         'result' => '1',
//         'data' => '添加失敗',
//         'error' => mysqli_error($con),
//     ]);
// }

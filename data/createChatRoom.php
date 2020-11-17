<?php

header('Content-Type: application/json; charset=UTF-8');
$con = mysqli_connect('localhost', 'root', '');

if (!$con) {
    die('Could not connect: ' . mysql_error());
    return json_encode(['result' => '1', 'data' => '伺服器連接失敗']);
}

$selected = mysqli_select_db($con, 'chatbot');

$sql = "INSERT INTO chatrooms (user_id, nick_name, role_id,
                            role_name, habbit_id,
                            habbit_name, habbit_status, signed_time,
                            original_intention, goodness,
                            badness,days)
    VALUES 
        ('$_POST[user_id]','$_POST[nick_name]', '$_POST[role_id]', 
        '$_POST[role_name]', '$_POST[habbit_id]',
        '$_POST[habbit_name]', '養成中', '$_POST[signed_time]',
        '$_POST[original_intention]','$_POST[goodness]',
        '$_POST[badness]', '$_POST[days]')";

if (!mysqli_query($con, $sql)) {
    //die 'Error: ' . mysqli_error($con);
    echo json_encode([
        'result' => '1',
        'data' => '添加失敗',
        'error' => mysqli_error($con),
    ]);
} else {
    $chatroom_id = $con->insert_id;
    // var_dump($chatroom_id);
    // echo json_encode(['result' => '0', 'data' => '添加成功', 'return chatroom_id: ' => $con->insert_id,]);
    $con = new mysqli('localhost', 'root', '', 'chatbot');
    $user_id = "$_POST[user_id]";
    $targetDir = "C:/xampp/htdocs/chatbot109204/upload/"; //搬移路徑
    // $fileName = $chatroom_id . "_" . basename($_FILES["role_photo"]["name"]); //檔名
    $fileName = $chatroom_id . "_rolePhoto.jpg" ; //檔名
    $dest = $targetDir . $fileName;
    $filePath = $_FILES["role_photo"]["tmp_name"]; //暫存路徑
    $fileType = $_FILES["role_photo"]["type"];
    var_dump($filePath);

    if(!empty($fileName)){

        $allowTypes = array('image/jpg','image/png','image/jpeg','image/gif','image/pdf');
        if (file_exists('D:/xampp/htdocs/chatbot109204/upload/' . $fileName)){
            echo json_encode(array('result' => '1', 'data' => '檔案已存在。', 'error' => mysqli_error($con)));
            
        }else if(in_array($fileType, $allowTypes)){
            // Upload file to server
            var_dump('hello',$fileType, $filePath, $dest);
            if(move_uploaded_file($filePath, $dest)){
                // Insert image file name into database
                $insert = $con->query("UPDATE chatrooms SET role_photo='".$fileName."'
                                    WHERE chatroom_id = $chatroom_id ");
    
                if($insert){
                    echo json_encode(array('result' => '0', 'data' => '添加成功', 'chatroom_id' => $con->insert_id));
                }else{
                    echo json_encode(array('result' => '1', 'data' => '添加失敗', 'error' => mysqli_error($con)));
                } 
            }
        }else{
            // var_dump($fileType, $allowTypes);
              echo json_encode(array('result' => '1', 'data' => '只能存 JPG, JPEG, PNG, GIF, & PDF格式的照片', 'error' => mysqli_error($con)));
        }
    }
}

// if(!empty($fileName)){
//     // Allow certain file formats
//     $allowTypes = array('jpg','png','jpeg','gif','pdf');
	
// 	if (file_exists('D:/xampp/htdocs/chatbot109204/upload/' . $fileName)){
// 		echo json_encode(array('result' => '1', 'data' => '檔案已存在。', 'error' => mysqli_error($con)));
		
// 	}else if(in_array($fileType, $allowTypes)){
//         // Upload file to server
//         if(move_uploaded_file($file_path, $dest)){
//             // Insert image file name into database
//             $insert = $con->query("INSERT INTO users (user_id, user_name, mail, userPhoto)
//                                   VALUES  ('".$user_id."', '$_POST[user_name]', '$_POST[mail]', '".$fileName."')");
//             $insert = $con->query("UPDATE chatrooms SET role_photo='".$fileName."'
//                                 WHERE chatroom_id = $chatroom_id ");

//             if($insert){
//                 echo json_encode(array('result' => '0', 'data' => '添加成功'));
//             }else{
//                 echo json_encode(array('result' => '1', 'data' => '添加失敗', 'error' => mysqli_error($con)));
//             } 
//         }
		
//     }else{
// 		  echo json_encode(array('result' => '1', 'data' => '只能存 JPG, JPEG, PNG, GIF, & PDF格式的照片', 'error' => mysqli_error($con)));
//     }
// }
mysqli_close($con);
?>

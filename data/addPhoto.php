<?php

header('Content-Type: application/json; charset=UTF-8');
$con = mysqli_connect('localhost', 'root', '');

if (!$con) {
    die('Could not connect: ' . mysql_error());
    return json_encode(['result' => '1', 'data' => '伺服器連接失敗']);
}

$selected = mysqli_select_db($con, 'chatbot');

$con = new mysqli('localhost', 'root', '', 'chatbot');
$number = "$_POST[number]";
$targetDir = "C:/xampp/htdocs/chatbot109204/upload/"; //搬移路徑
// $fileName = $chatroom_id . "_" . basename($_FILES["role_photo"]["name"]); //檔名
$fileName = $number . "_test.jpg" ; //檔名
$dest = $targetDir . $fileName;
$filePath = $_FILES["image"]["tmp_name"]; //暫存路徑
$fileType = $_FILES["image"]["type"];

if(!empty($fileName)){

    $allowTypes = array('image/jpg','image/png','image/jpeg');
    if (file_exists('D:/xampp/htdocs/chatbot109204/upload/' . $fileName)){
        echo json_encode(array('result' => '1', 'data' => '檔案已存在。', 'error' => mysqli_error($con)));
        
    }else if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($filePath, $dest)){
            // Insert image file name into database
            $insert = $con->query("INSERT INTO test_image (number, image) VALUES ('$_POST[number]', '".$fileName."') ");

            if($insert){
                echo json_encode(array('result' => '0', 'data' => '添加成功'));
            }else{
                echo json_encode(array('result' => '1', 'data' => '添加失敗', 'error' => mysqli_error($con)));
            } 
        }
    }else{
        // var_dump($fileType, $allowTypes);
            echo json_encode(array('result' => '1', 'data' => '只能存 JPG, JPEG, PNG, GIF, & PDF格式的照片', 'error' => mysqli_error($con)));
    }
}


mysqli_close($con);
?>

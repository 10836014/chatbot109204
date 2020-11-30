<?php
    // $sql="INSERT INTO posts (user_id, habbit_id, content, post_image, created_at, updated_at)
    // VALUES
    // ('$_POST[user_id]', '$_POST[habbit_id]', '$_POST[content]', post_image='".$fileName."', NOW(), NOW())";
    header('Content-Type: application/json; charset=UTF-8');
    $con = mysqli_connect('localhost', 'root', '');
    
    if (!$con) {
        die('Could not connect: ' . mysql_error());
        return json_encode(['result' => '1', 'data' => '伺服器連接失敗']);
    }
    
    $selected = mysqli_select_db($con, 'chatbot');
            
    $sql="INSERT INTO posts (user_id, habbit_id, content, created_at, updated_at)
            VALUES 
         ('$_POST[user_id]', '$_POST[habbit_id]', '$_POST[content]', NOW(), NOW())";
    
    
    if (!mysqli_query($con, $sql)) {
        //die 'Error: ' . mysqli_error($con);
        echo json_encode([
            'result' => '1',
            'data' => '添加失敗',
            'error' => mysqli_error($con),
        ]);
    } else {
        $post_id = $con->insert_id;
        $con = new mysqli('localhost', 'root', '', 'chatbot');
        $targetDir = "C:/xampp/htdocs/chatbot109204/upload/"; //搬移路徑
        // $fileName = $chatroom_id . "_" . basename($_FILES["role_photo"]["name"]); //檔名
        $fileName = $post_id . "_postPhoto.jpg" ; //檔名
        $dest = $targetDir . $fileName;
        $filePath = $_FILES["post_photo"]["tmp_name"]; //暫存路徑
        $fileType = $_FILES["post_photo"]["type"];
    
        if (!empty($fileName)) {
            $allowTypes = array('image/jpg','image/png','image/jpeg','image/gif','image/pdf');
            if (file_exists('D:/xampp/htdocs/chatbot109204/upload/' . $fileName)) {
                echo json_encode(array('result' => '1', 'data' => '檔案已存在。', 'error' => mysqli_error($con)));
            } elseif (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($filePath, $dest)) {
                    // Insert image file name into database
                    $insert = $con->query("UPDATE posts SET post_photo='".$fileName."'
                                        WHERE post_id = $post_id ");
        
                    if ($insert) {
                        echo json_encode(array('result' => '0', 'data' => '添加成功', 'post_id' => $post_id));
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

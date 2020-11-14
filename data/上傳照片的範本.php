<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "chatbot";

header("Content-Type: application/json; charset=UTF-8");
// Create database connection
$con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$con){
   die('Could not connect: ' . mysql_error());
   return json_encode(array('result' => '1', 'data' => '伺服器連接失敗'));
}

//$file = is_uploaded_file($_FILES['my_file']['tmp_name']))
// File upload path

$user_id = "$_POST[user_id]";
$targetDir = "D:/xampp/htdocs/chatbot109204/upload/"; //搬移路徑
$fileName = $user_id . "_" . basename($_FILES["userPhoto"]["name"]); //檔名
$dest = $targetDir . $fileName;
$file_path = $_FILES["userPhoto"]["tmp_name"]; //暫存路徑
$fileType = pathinfo($dest, PATHINFO_EXTENSION); //檔案類型


if(!empty($fileName)){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
	
	if (file_exists('D:/xampp/htdocs/chatbot109204/upload/' . $fileName)){
		echo json_encode(array('result' => '1', 'data' => '檔案已存在。', 'error' => mysqli_error($con)));
		
	}else if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($file_path, $dest)){
            // Insert image file name into database
            $insert = $con->query("INSERT INTO users (user_id, user_name, mail, userPhoto)
                                  VALUES  ('".$user_id."', '$_POST[user_name]', '$_POST[mail]', '".$fileName."')");
            if($insert){
                echo json_encode(array('result' => '0', 'data' => '添加成功'));
            }else{
                echo json_encode(array('result' => '1', 'data' => '添加失敗', 'error' => mysqli_error($con)));
            } 
        }
		
    }else{
		  echo json_encode(array('result' => '1', 'data' => '只能存 JPG, JPEG, PNG, GIF, & PDF格式的照片', 'error' => mysqli_error($con)));
    }
}

mysqli_close($con);

?>
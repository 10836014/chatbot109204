<?php
// header("Content-Type: application/json; charset=UTF-8");
header('Content-Type: image/jpeg');

$con = mysqli_connect('localhost', 'root', '');

if (!$con) {
    die('Could not connect: ' . mysql_error());
    return json_encode(['result' => '1', 'data' => '伺服器連接失敗']);
}

$selected = mysqli_select_db($con, 'chatbot');

$file = $_FILES['file']; //得到传输的数据
if (isset($_POST['but_upload'])) {
    $name = $_FILES['file']['name'];
    $target_dir = './upload/';
    $target_file = $target_dir . basename($_FILES['file']['name']);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = ['jpg', 'jpeg', 'png', 'gif'];

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {
        // Insert record
        $query = "INSERT INTO users (user_id, user_name, mail, user_photo)
        VALUES ('$_POST[user_id]','$_POST[user_name]', '$_POST[mail]')";
        mysqli_query($con, $query);

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
    }
}
// //得到文件名称
// var_dump($file);

// $name = $file['name'];
// $type = strtolower(substr($name, strrpos($name, '.') + 1)); //得到文件类型，并且都转化成小写
// $allow_type = ['jpg', 'jpeg', 'gif', 'png']; //定义允许上传的类型
// //判断文件类型是否被允许上传
// if (!in_array($type, $allow_type)) {
//     //如果不被允许，则直接停止程序运行
//     return;
// }
// //判断是否是通过HTTP POST上传的
// if (!is_uploaded_file($file['tmp_name'])) {
//     //如果不是通过HTTP POST上传的
//     return;
// }
// $upload_path = './upload/'; //上传文件的存放路径
// //开始移动文件到相应的文件夹
// if (move_uploaded_file($file['tmp_name'], $upload_path . $file['name'])) {
//     echo 'Successfully!';
// } else {
//     echo 'Failed!';
// }

// Check if the user entered an image
// if ($_FILES['imagefile']['name'] != '') {
//     $image = scaleImageFileToBlob($_FILES['imagefile']['tmp_name']);

//     if ($image == '') {
//         echo 'Image type not supported';
//     } else {
//         $image_type = $_FILES['imagefile']['type'];
//         $image = addslashes($image);

//         // $sql="UPDATE users SET birthday='$_POST[birthday]',  gender='$_POST[gender]'
//         // WHERE user_id='$_POST[user_id]'";

//         // $query  = "UPDATE yourtable SET image_type='$image_type', image='$image' WHERE ...";
//         $result = mysql_query($query);
//         if ($result) {
//            echo 'Image scaled and uploaded';
//          } else {
//            echo 'Error running the query';
//          }
//     }
// } -->
?>

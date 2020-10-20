<?php
    // header("Content-Type: application/json; charset=UTF-8");
    header('Content-Type: image/jpeg');

    $con = mysqli_connect("localhost","root","");

    if (!$con){
        die('Could not connect: ' . mysql_error());
        return json_encode(array('result' => '1', 'data' => '伺服器連接失敗'));
    }

    $selected = mysqli_select_db($con, "chatbot");   

    // Check if the user entered an image
    if ($_FILES['imagefile']['name'] != '') {
        $image = scaleImageFileToBlob($_FILES['imagefile']['tmp_name']);

        if ($image == '') {
            echo 'Image type not supported';
        } else {
            $image_type = $_FILES['imagefile']['type'];
            $image = addslashes($image);
           
            // $sql="UPDATE users SET birthday='$_POST[birthday]',  gender='$_POST[gender]'
            // WHERE user_id='$_POST[user_id]'";

            $query  = "UPDATE yourtable SET image_type='$image_type', image='$image' WHERE ...";
            $result = mysql_query($query);
            if ($result) {
               echo 'Image scaled and uploaded';
             } else {
               echo 'Error running the query';
             }
        }
    }

?>
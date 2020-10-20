<?php
     
    header("Content-Type: application/json; charset=UTF-8");
    $con = mysqli_connect("localhost","root","");

    if (!$con){
        die('Could not connect: ' . mysql_error());
        return json_encode(array('result' => '1', 'data' => '伺服器連接失敗'));
    }

    $selected = mysqli_select_db($con, "chatbot");

    $sql="UPDATE posts SET likes='$_POST[likes]'
    WHERE user_id='$_POST[user_id]' AND post_id='$_POST[user_id]'";

    mysqli_query($con,$sql);

    if (!mysqli_query($con,$sql)){
    //die 'Error: ' . mysqli_error($con);
        echo json_encode(array('result' => '1', 'data' => '按讚失敗', 'error' => mysqli_error($con)));
        echo ('Error: ' . mysqli_error($con));
    }else{
        echo json_encode(array('result' => '0', 'data' => '按讚成功'));
    }
    mysqli_close($con);
?>

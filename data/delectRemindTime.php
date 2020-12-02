<?php
     
    header("Content-Type: application/json; charset=UTF-8");
    $con = mysqli_connect("localhost", "root", "");

    if (!$con) {
        die('Could not connect: ' . mysql_error());
        return json_encode(array('result' => '1', 'data' => '伺服器連接失敗'));
    }

    $selected = mysqli_select_db($con, "chatbot");

    $sql="DELETE FROM remind_time WHERE chatroom_id='$_POST[chatroom_id]'";
    
    if (!mysqli_query($con, $sql)) {
        //die 'Error: ' . mysqli_error($con);
        echo json_encode(array('result' => '1', 'data' => '刪除remind_time失敗', 'error' => mysqli_error($con)));
    } else {
        echo json_encode(array('result' => '0', 'data' => '刪除remind_time成功'));
    }
    mysqli_close($con);

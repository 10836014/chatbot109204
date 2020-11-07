<?php
     
    header("Content-Type: application/json; charset=UTF-8");
    $con = mysqli_connect("localhost","root","");

    if (!$con){
        die('Could not connect: ' . mysql_error());
        return json_encode(array('result' => '1', 'data' => '伺服器連接失敗'));
    }

    $selected = mysqli_select_db($con, "chatbot");

    $sql="INSERT INTO remind_time (chatroom_id, remind_time)
    VALUES 
        ('$_POST[chatroom_id]','$_POST[remind_time]'); ";
    

    if (!mysqli_query($con,$sql)){
    //die 'Error: ' . mysqli_error($con);
    echo json_encode(array('result' => '1', 'data' => '添加失敗', 'error' => mysqli_error($con)));
    }else{
    // echo json_encode(array('result' => '0', 'data' => '添加成功'));
    echo json_encode(array('result' => '0', 'data' => '添加成功', 'return remind_id: ' => $con->insert_id));
    }
    mysqli_close($con);
?>

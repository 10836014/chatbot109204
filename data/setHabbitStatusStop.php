<?php
     
    header("Content-Type: application/json; charset=UTF-8");
    $con = mysqli_connect("localhost","root","");

    if (!$con){
        die('Could not connect: ' . mysql_error());
        return json_encode(array('result' => '1', 'data' => '伺服器連接失敗'));
    }

    $selected = mysqli_select_db($con, "chatbot") ;

    $sql="UPDATE chatrooms SET habbit_status='暫停中'
        WHERE user_id='$_POST[user_id]' AND chatroom_id='$_POST[chatroom_id]' AND habbit_status='養成中'";

    mysqli_query($con,$sql);

    if (!mysqli_query($con,$sql)){
        echo json_encode(array('result' => '1', 'data' => '修改習慣狀態為\'暫停中\'失敗', 'error' => mysqli_error($con)));
    }else{
        echo json_encode(array('result' => '0', 'data' => '修改習慣狀態為\'暫停中\'成功'));
    }
    mysqli_close($con);
?>

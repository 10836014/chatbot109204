<?php
     
    header("Content-Type: application/json; charset=UTF-8");
    $con = mysqli_connect("localhost","root","");

    if (!$con){
        die('Could not connect: ' . mysql_error());
        return json_encode(array('result' => '1', 'data' => '伺服器連接失敗'));
    }

    $selected = mysqli_select_db($con, "chatbot");

    $sql_1="DELETE FROM chatrooms WHERE user_id='$_POST[user_id]'";
    mysqli_query($con,$sql_1);
    
    $sql_2="DELETE FROM likes WHERE user_id='$_POST[user_id]'";  
    mysqli_query($con,$sql_2);

    $sql_3="DELETE FROM posts WHERE user_id='$_POST[user_id]'";  
    mysqli_query($con,$sql_3);

    $sql_4="DELETE FROM users WHERE user_id='$_POST[user_id]'";  
    mysqli_query($con,$sql_4);

    if (!mysqli_query($con,$sql_4)){
    //die 'Error: ' . mysqli_error($con);
        echo json_encode(array('result' => '1', 'data' => '刪除使用者失敗', 'error' => mysqli_error($con)));
        echo ('Error: ' . mysqli_error($con));
    }else{
        echo json_encode(array('result' => '0', 'data' => '刪除使用者成功，所有貼文、按讚紀錄都一起刪除了'));
    }
    mysqli_close($con);
?>

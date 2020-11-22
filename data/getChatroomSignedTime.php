<?php
    
    $con = mysqli_connect("localhost", "root", "", "chatbot");
    
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    
    // $sql = "SELECT * FROM `chatrooms`";
    $query = "SELECT signed_time FROM `chatrooms` WHERE chatroom_id='$_POST[chatroom_id]' ";

    if (!mysqli_query($con, $query)) {
        echo json_encode(array('result' => '1', 'data' => '查無此chatroom_id', 'error' => mysqli_error($con)));
        echo json_encode(array('result' => '1', 'data' => '查無此chatroom_id', 'error' => mysqli_error($con)));
    } else {
        $result = mysqli_query($con, $query);
        $return_result = (mysqli_fetch_all($result, MYSQLI_ASSOC));
        $signed_time =$return_result[0]['signed_time'];
        echo json_encode(array('signed_time' =>$signed_time));
    }
    mysqli_close($con);

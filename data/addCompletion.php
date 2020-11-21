<?php
     
    header("Content-Type: application/json; charset=UTF-8");
    $con = mysqli_connect("localhost","root","");

    if (!$con){
        die('Could not connect: ' . mysql_error());
        return json_encode(array('result' => '1', 'data' => '伺服器連接失敗'));
    }

    $selected = mysqli_select_db($con, "chatbot");

    $sql="UPDATE chatrooms SET completion= completion +1
        WHERE user_id='$_POST[user_id]' AND chatroom_id='$_POST[chatroom_id]' ";
    
    // mysqli_query($con,$sql);

    if (!mysqli_query($con,$sql))
    {
        echo json_encode(array('result' => '1', 'data' => '修改習慣完成次數失敗', 'error' => mysqli_error($con)));
    }else{

        $query = "SELECT completion FROM `chatrooms` WHERE chatroom_id='$_POST[chatroom_id]' ";
        $result = mysqli_query($con, $query);
        $completion = json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));

        // $string = preg_replace('~\[~',  '', $completion);
        // $aaa = preg_replace('~]~', '', $string);
        // $qqq = substr($aaa, 15, 3); 
        // 充滿血淚的拆字 return回來的是字串

        // $kkk = preg_replace('/[^\d]/','',$completion);  //可行
        $kkk = preg_replace('/[^0-9]/', '', $completion);  //可行
        // 原理：用正規表示法做取代，取代除了數字以外的都取代成空白
        // 我真的先吐血
        echo json_encode(array('result' => '0', 'data' => '修改習慣完成次數成功', 'completion'=>($kkk)));

    }
    mysqli_close($con);
?>

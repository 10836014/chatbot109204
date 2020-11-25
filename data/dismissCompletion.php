<?php
     
    header("Content-Type: application/json; charset=UTF-8");
    $con = mysqli_connect("localhost", "root", "");

    if (!$con) {
        die('Could not connect: ' . mysql_error());
        return json_encode(array('result' => '1', 'data' => '伺服器連接失敗'));
    }

    $selected = mysqli_select_db($con, "chatbot");

    $chatroom = "SELECT * FROM chatrooms where chatroom_id= '$_POST[chatroom_id]' AND user_id = '$_POST[user_id]'";

    $chatroom_sql = mysqli_query($con, $chatroom);
    $chatroom_result = mysqli_fetch_all($chatroom_sql, MYSQLI_ASSOC);
    // var_dump($chatroom_result);
    if (count($chatroom_result) == 0) {
        echo json_encode(array('result' => '1', 'data' => '查無此聊天室id或user_id'));
        die();
    }

    // 傳入聊天室id，回傳使用者資料
    $chatroom_id =$chatroom_result[0]['chatroom_id'];
    $user_id =$chatroom_result[0]['user_id'];
    $nick_name =$chatroom_result[0]['nick_name'];
    $habbit_name =$chatroom_result[0]['habbit_name'];

    $query = "SELECT completion FROM `chatrooms` WHERE chatroom_id='$_POST[chatroom_id]' ";
    $result = mysqli_query($con, $query);
    $completion = json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
    if (!mysqli_query($con, $query)) {
        echo json_encode(array('result' => '1', 'data' => '查無此聊天室id', 'error' => mysqli_error($con)));
    } else {
        // 取得劇本資料
        // $script = "SELECT * FROM praise ORDER BY sequence ASC, id ASC LIMIT 1";
        $script = "SELECT * FROM notice ORDER BY RAND() LIMIT 1";
        // 用來測試句型回傳對不對(直接指定type)
        // $script = "SELECT * FROM notice WHERE type = 3 ORDER BY sequence ASC, id ASC LIMIT 1";
        if (!mysqli_query($con, $script)) {
            echo json_encode(array('result' => '1', 'data' => '查無此劇本資料表_notice', 'error' => mysqli_error($con)));
        } else {
            $script_sql = mysqli_query($con, $script);
            $script_result = mysqli_fetch_all($script_sql, MYSQLI_ASSOC);
            // 取得劇本回傳欄位
            $type =$script_result[0]['type'];
            $phase1 =$script_result[0]['phase1'];
            $phase2 =$script_result[0]['phase2'];
            if ($type == 1) {
                $answer = ($nick_name . $phase1. $habbit_name . $phase2);
            } elseif ($type == 2) {
                $answer = ($phase1 . $habbit_name);
            } elseif ($type == 3) {
                $answer =  ($phase1 . $habbit_name. $phase2);
            } elseif ($type == 4) {
                $answer = ($nick_name . $phase1);
            } elseif ($type == 5) {
                $answer = ($phase1);
            } elseif ($type == 6) {
                $answer = ($phase1 . $nick_name . $phase2);
            } else {
                $answer = ('查無此句型格式');
            }
        }

        // $string = preg_replace('~\[~',  '', $completion);
        // $aaa = preg_replace('~]~', '', $string);
        // $qqq = substr($aaa, 15, 3);
        // 充滿血淚的拆字 return回來的是字串

        // $kkk = preg_replace('/[^\d]/','',$completion);  //可行
    $kkk = preg_replace('/[^0-9]/', '', $completion);  //可行
    // 原理：用正規表示法做取代，取代除了數字以外的都取代成空白
    // 我真的先吐血
    echo json_encode(array('result' => '0', 'data' => '沒有完成習慣', 'completion'=>($kkk), 'answer'=>$answer));
    }
    
    mysqli_close($con);

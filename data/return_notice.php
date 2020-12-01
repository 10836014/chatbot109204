<?php
    
    $con = mysqli_connect("localhost", "root", "", "chatbot");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // 取得劇本資料
    // $script = "SELECT * FROM notice ORDER BY sequence ASC, id ASC LIMIT 1";
    $script = "SELECT * FROM notice ORDER BY RAND() LIMIT 1";
    // 用來測試句型回傳對不對(直接指定type)
    // $script = "SELECT * FROM notice WHERE type = 3 ORDER BY sequence ASC, id ASC LIMIT 1";
    if (!mysqli_query($con, $script)) {
        echo json_encode(array('result' => '1', 'data' => '查無此劇本資料表_notice', 'error' => mysqli_error($con)));
    } else {
        $script_sql = mysqli_query($con, $script);
        $script_result = mysqli_fetch_all($script_sql, MYSQLI_ASSOC);
        // 取得劇本回傳欄位
        $id =$script_result[0]['id'];
        $type =$script_result[0]['type'];
        $phase1 =$script_result[0]['phase1'];
        $phase2 =$script_result[0]['phase2'];
        $created_at =$script_result[0]['created_at'];
        $updated_at =$script_result[0]['updated_at'];
        $chatroom = "SELECT * FROM chatrooms where chatroom_id= '$_POST[chatroom_id]' ";
        if (!mysqli_query($con, $chatroom)) {
            echo json_encode(array('result' => '1', 'data' => '與聊天室資料表連接錯誤'));
        } else {
            $chatroom_sql = mysqli_query($con, $chatroom);
            $chatroom_result = mysqli_fetch_all($chatroom_sql, MYSQLI_ASSOC);

            if (count($chatroom_result) == 0) {
                echo json_encode(array('result' => '1', 'data' => '查無此聊天室，請確認傳入id是否正確'));
            } else {
                // 傳入聊天室id，回傳使用者資料
                $chatroom_id =$chatroom_result[0]['chatroom_id'];
                $user_id =$chatroom_result[0]['user_id'];
                $nick_name =$chatroom_result[0]['nick_name'];
                $habbit_name =$chatroom_result[0]['habbit_name'];
                $original_intention = $chatroom_result[0]['original_intention'];
                $goodness = $chatroom_result[0]['goodness'];
                $badness = $chatroom_result[0]['badness'];
                $completion = $chatroom_result[0]['completion'];

                if ($type == 1) {
                    $answer = $nick_name . $phase1. $habbit_name . $phase2 ;
                } elseif ($type == 2) {
                    $answer = $phase1 . $habbit_name ;
                } elseif ($type == 3) {
                    $answer = $phase1 . $habbit_name. $phase2 ;
                } elseif ($type == 4) {
                    $answer = $nick_name . $phase1 . '!' ;
                } elseif ($type == 5) {
                    $answer = $phase1 ;
                } elseif ($type == 6) {
                    $answer = $phase1 . $nick_name . $phase2 .'!' ;
                }

                $rand_int = (random_int(1, 100));
                $rand = $rand_int % 13;

                if ($rand == 0) {
                    echo json_encode([
                        'answer' => '不要再發懶了，快快去' . $habbit_name .'有我陪著你的！',
                        'type' => $rand
                    ]);
                } elseif ($rand == 1) {
                    echo json_encode([
                        'answer' => $answer,
                        'type' => $rand
                    ]);
                } elseif ($rand == 2) {
                    echo json_encode([
                        'answer' => $answer,
                        'type' => $rand
                    ]);
                } elseif ($rand == 3) {
                    echo json_encode([
                        'answer' => $answer,
                        'type' => $rand
                    ]);
                } elseif ($rand == 4) {
                    echo json_encode([
                        'answer' => $answer,
                        'type' => $rand
                    ]);
                } elseif ($rand == 5) {
                    echo json_encode([
                        'answer' => $answer,
                        'type' => $rand
                    ]);
                } elseif ($rand == 6) {
                    echo json_encode([
                        'answer' => $answer,
                        'type' => $rand
                    ]);
                } elseif ($rand == 7) {
                    echo json_encode([
                        'answer' => '別忘記你的' . $original_intention .'阿!',
                        'type' => $rand
                    ]);
                } elseif ($rand == 8) {
                    echo json_encode([
                        'answer' => '如果你乖乖的' . $habbit_name .'就可以' . $goodness. '哦',
                        'type' => $rand
                    ]);
                } elseif ($rand == 9) {
                    echo json_encode([
                        'answer' => '再不' . $habbit_name . '小心' . $badness,
                        'type' => $rand
                    ]);
                } elseif ($rand == 10) {
                    echo json_encode([
                        'answer' => '你一定可以的！已經累計養成' . $completion . '次好習慣囉',
                        'type' => $rand
                    ]);
                } elseif ($rand == 11) {
                    echo json_encode([
                        'answer' => $habbit_name . '對你來說很容易的吧！你一定可以的',
                        'type' => $rand
                    ]);
                } elseif ($rand == 12) {
                    echo json_encode([
                        'answer' => '再堅持一下，' . $goodness . '離你不遠了！',
                        'type' => $rand
                    ]);
                } else {
                    echo json_encode([
                        'answer' => '查無此句型格式'
                    ]);
                }
            }
        }
    }

    mysqli_close($con);

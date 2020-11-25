<?php
    
    $con = mysqli_connect("localhost", "root", "", "chatbot");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // 取得聊天室資料
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

            $rand_int = (random_int(1, 100));
            $rand = $rand_int % 7;

            if ($rand == 0) {
                echo json_encode([
                    'answer' => '不要再發懶了，快快去' . $habbit_name .'有我陪著你的！',
                    'type' => $rand
                ]);
            } elseif ($rand == 1) {
                echo json_encode([
                    'answer' => '別忘記你的' . $original_intention .'阿!',
                    'type' => $rand
                ]);
            } elseif ($rand == 2) {
                echo json_encode([
                    'answer' => '如果你乖乖的' . $habbit_name .'就可以' . $goodness. '哦',
                    'type' => $rand
                ]);
            } elseif ($rand == 3) {
                echo json_encode([
                    'answer' => '再不' . $habbit_name . '小心' . $badness,
                    'type' => $rand
                ]);
            } elseif ($rand == 4) {
                echo json_encode([
                    'answer' => '你一定可以的！已經累計養成' . $completion . '次好習慣囉',
                    'type' => $rand
                ]);
            } elseif ($rand == 5) {
                echo json_encode([
                    'answer' => $habbit_name . '對你來說很容易的吧！你一定可以的',
                    'type' => $rand
                ]);
            } elseif ($rand == 6) {
                echo json_encode([
                    'answer' => '再堅持一下' . $goodness . '離你不遠了！',
                    'type' => $rand
                ]);
            }

            // elseif ($rand == 4) {
            //     echo json_encode([
            //     'answer' => $nick_name . $phase1.'!'
            // ]);
            // } elseif ($rand == 5) {
            //     echo json_encode([
            //     'answer' => $phase1
            // ]);
            // } elseif ($rand == 6) {
            //     echo json_encode([
            //     'answer' => $phase1 . $nick_name . $phase2 .'!'
            // ]);
            // } else {
            //     echo json_encode([
            //     'answer' => '查無此句型格式'
            // ]);
            // }
        }
    }

    mysqli_close($con);

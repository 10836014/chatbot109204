<?php
     
    header("Content-Type: application/json; charset=UTF-8");
    $con = mysqli_connect("localhost","root","");

    if (!$con){
        die('Could not connect: ' . mysql_error());
        return json_encode(array('result' => '1', 'data' => '伺服器連接失敗'));
    }

    $selected = mysqli_select_db($con, "chatbot");

    $sql = "DELETE FROM likes WHERE user_id='$_POST[user_id]' AND post_id='$_POST[post_id]'";

    // 取得影響資料數量 $result
    $con -> query("DELETE FROM likes WHERE user_id='$_POST[user_id]' AND post_id='$_POST[post_id]'");
    $result = ($con -> affected_rows);
    // mysqli_query($con,$sql);

    if ($result !== 0){
    $sql = "SELECT count(l.post_id) AS likes FROM posts AS p INNER JOIN likes AS l ON l.post_id = p.post_id WHERE p.post_id='$_POST[post_id]'";
        $result = mysqli_query($con, $sql);
        $like = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $like = ($like[0]['likes']);
        echo json_encode(array('result' => '0',
        'data' => "取消按讚成功，欄位更新數量 :" . $con -> affected_rows,
        'likes' => $like));
    }
    else if ($result == 0){
        //die 'Error: ' . mysqli_error($con);
        echo json_encode(array('result' => '1', 
        'data' => "失敗，修改到的資料數量為零 :" . $con -> affected_rows, 
        'message'=>'可能是沒有對這貼文按過讚，或是已收回'));
    }else if (!mysqli_query($con,$sql)){
        echo json_encode(array('result' => '1',
        'data' => '取消按讚失敗',
        'error' => mysqli_error($con)));
        }
    else{
        $sql = "SELECT count(l.post_id) AS likes FROM posts AS p INNER JOIN likes AS l ON l.post_id = p.post_id WHERE p.post_id='$_POST[post_id]'";
        $result = mysqli_query($con, $sql);
        $like = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $like = ($like[0]['likes']);

        echo json_encode(array('result' => '0', 'data' => "取消按讚成功", 'likes' => $like));
    }
    mysqli_close($con);
?>

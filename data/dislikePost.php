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
        // if ($colum === true){
            //die 'Error: ' . mysqli_error($con);
            echo json_encode(array('result' => '0',
            'data' => "取消按讚成功，欄位更新數量 :" . $con -> affected_rows));
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
            echo json_encode(array('result' => '0',
            'data' => "取消按讚成功"));
        }
    mysqli_close($con);
?>

<?php
     
    header("Content-Type: application/json; charset=UTF-8");
    $con = mysqli_connect("localhost","root","");

    if (!$con){
        die('Could not connect: ' . mysql_error());
        return json_encode(array('result' => '1', 'data' => '伺服器連接失敗'));
    }

    $selected = mysqli_select_db($con, "chatbot");
 

    $sql="UPDATE users SET birthday='$_POST[birthday]',  gender='$_POST[gender]'
    WHERE user_id='$_POST[user_id]'";

    // $num=mysqli_num_rows($result); // 適用於select
    // $num=mysqli_affected_rows($result); // INSERT、UPDATE、DELETE
    // var_dump(mysqli_affected_rows(mysqli_query($con,$sql)));

    $con -> query("UPDATE users SET birthday='$_POST[birthday]',  gender='$_POST[gender]'
    WHERE user_id='$_POST[user_id]'");

    // echo "Affected rows: " . $con -> affected_rows ;
    $result = ($con -> affected_rows);

    if ($result !== 0){
    // if ($colum === true){
        //die 'Error: ' . mysqli_error($con);
        echo json_encode(array('result' => '0',
        'data' => "成功，修改到的資料數量 :" . $con -> affected_rows));
        echo ('Error: ' . mysqli_error($con));
    }
    else if ($result == 0){
        //die 'Error: ' . mysqli_error($con);
        echo json_encode(array('result' => '1', 
        'data' => "失敗，修改到的資料數量為零 :" . $con -> affected_rows, 
        'message 1'=>'可能是修改資料相同，沒變更到',
        'message 2'=>'或是查無此id'));
        echo ('Error: ' . mysqli_error($con));
    }else if (!mysqli_query($con,$sql)){
        echo json_encode(array('result' => '1',
        'data' => '添加失敗',
        'error' => mysqli_error($con)));
        }
    else{
        echo json_encode(array('result' => '0',
        'data' => "傳入使用者生日、性別成功"));
    }
    mysqli_close($con);
?>

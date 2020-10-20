<?php
     
    header("Content-Type: application/json; charset=UTF-8");
    $con = mysqli_connect("localhost","root","");

    if (!$con){
        die('Could not connect: ' . mysql_error());
        return json_encode(array('result' => '1', 'data' => '伺服器連接失敗'));
    }

    $selected = mysqli_select_db($con, "chatbot");

    $sql="INSERT INTO chatrooms (user_id, nick_name, role_id,
                            role_name, role_photo, habbit_id,
                            habbit_name, habbit_status, signed_time,
                            original_intention, goodnees,
                            badnees)
    VALUES 
        ('$_POST[user_id]','$_POST[nick_name]', '$_POST[role_id]', 
        '$_POST[role_name]', '$_POST[role_photo]', '$_POST[habbit_id]',
        '$_POST[habbit_name]', '養成中', '$_POST[signed_time]',
        '$_POST[original_intention]','$_POST[goodnees]',
        '$_POST[badnees]'); ";

    if (!mysqli_query($con,$sql)){
    //die 'Error: ' . mysqli_error($con);
    echo json_encode(array('result' => '1', 'data' => '添加失敗', 'error' => mysqli_error($con)));
    echo ('Error: ' . mysqli_error($con));
    }else{
    echo json_encode(array('result' => '0', 'data' => '添加成功'));
    }
    mysqli_close($con);
?>

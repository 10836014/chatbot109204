<?php

header('Content-Type: application/json; charset=UTF-8');
$con = mysqli_connect('localhost', 'root', '');

if (!$con) {
    die('Could not connect: ' . mysql_error());
    return json_encode(['result' => '1', 'data' => '伺服器連接失敗']);
}

$selected = mysqli_select_db($con, 'chatbot');

$sql = "INSERT INTO chatrooms (user_id, habbit_id,
                            habbit_name, habbit_status, signed_time,
                            original_intention, goodness,
                            badness,days)
    VALUES 
        ('$_POST[user_id]', '$_POST[habbit_id]',
        '$_POST[habbit_name]', '養成中', '$_POST[signed_time]',
        '$_POST[original_intention]','$_POST[goodness]',
        '$_POST[badness]', '$_POST[days]')";

if (!mysqli_query($con, $sql)) {
    //die 'Error: ' . mysqli_error($con);
    echo json_encode([
        'result' => '1',
        'data' => '添加失敗',
        'error' => mysqli_error($con),
    ]);
} else {
    // echo json_encode(array('result' => '0', 'data' => '添加成功'));
    echo json_encode([
        'result' => '0',
        'data' => '添加成功',
        'chatroom_id' => $con->insert_id,
    ]);
}
mysqli_close($con);

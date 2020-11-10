<?php
// header寫法無效
header('Content-Type: application/json; charset=UTF-8');
$con = mysqli_connect('localhost', 'root', '');

if (!$con) {
    die('Could not connect: ' . mysql_error());
    return json_encode(['result' => '1', 'data' => '伺服器連接失敗']);
}

$selected = mysqli_select_db($con, 'chatbot');

$sql = "INSERT INTO users (user_id, user_name, mail)
            VALUES 
        ('$_POST[user_id]','$_POST[user_name]', '$_POST[mail]')";

if (!mysqli_query($con, $sql)) {
    //die 'Error: ' . mysqli_error($con);
    echo json_encode([
        'result' => '1',
        'data' => '添加失敗',
        'error' => mysqli_error($con),
    ]);
} else {
    echo json_encode(['result' => '0', 'data' => '添加成功']);
}
mysqli_close($con);
?>

<?php

    header("Content-Type: application/json; charset=UTF-8");
    $con = mysqli_connect("localhost", "root", "");

    if (!$con) {
        die('Could not connect: ' . mysql_error());
        return json_encode(array('result' => '1', 'data' => '伺服器連接失敗'));
    }

    $selected = mysqli_select_db($con, "chatbot");

    $sql="INSERT INTO role_cat (role_cat_name)
             VALUES 
         ('$_POST[role_cat_name]')";

     if (!mysqli_query($con, $sql)) {
         //die 'Error: ' . mysqli_error($con);
         echo json_encode(array('result' => '1', 'data' => '添加習慣分類失敗', 'error' => mysqli_error($con)));
     } else {
         echo json_encode(array('result' => '0', 'data' => '添加習慣分類成功', 'habbit_id' => $con->insert_id));
     }
     mysqli_close($con);
?>

public $role_id;
    public $role_cat_name;
<?php
    // header寫法無效
    header("Content-Type: application/json; charset=UTF-8");

    $con = mysqli_connect("us-cdbr-east-02.cleardb.com","bbb9298efa9b93","5f62769a");

    // mysqli_query寫法無效
     mysqli_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $con);
     
     /*if ($con){
        echo "result:1"; 
     }*/
     if (!$con){
         die('Could not connect: ' . mysql_error());
         return json_encode(array('result' => '1', 'data' => '伺服器連接失敗'));
     }

     $selected = mysqli_select_db($con, "heroku_4b25007c650d0dd") ;

     $sql="INSERT INTO user (userID, userName, email, created_at, updated_at)
             VALUES 
         ('$_POST[userID]','$_POST[userName]', '$_POST[email]'), NOW(), NOW()";

     if (!mysqli_query($con,$sql))
     {
     //die 'Error: ' . mysqli_error($con);
     echo json_encode(array('result' => '1', 'data' => '添加失敗', 'error' => mysqli_error($con), 'data' => $sql));
     }else{
     echo json_encode(array('result' => '0', 'data' => '添加成功'));
     }
     mysqli_close($con)
?>

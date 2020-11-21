<?php
    
    $con = mysqli_connect("localhost","root","","chatbot");
    
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    } 
    
    // $sql = "SELECT * FROM `chatrooms`";
    $query = "SELECT completion FROM `chatrooms` WHERE chatroom_id='1' ";
    $result = mysqli_query($con, $query);
    // var_dump($result);
    
    // Fetch all
    echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC),false);
    // echo json_encode($result);
    
    // Free result set
    // echo json_encode(mysqli_free_result($result));
    
    mysqli_close($con);

?>
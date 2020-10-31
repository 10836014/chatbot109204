<?php
    
    $con = mysqli_connect("localhost","root","","chatbot");
    
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    } 
    
    $sql = "SELECT * FROM `chatrooms`";
    $result = mysqli_query($con, $sql);
    // var_dump($result);
    
    // Fetch all
    echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
    
    // Free result set
    // echo json_encode(mysqli_free_result($result));
    
    mysqli_close($con);

?>
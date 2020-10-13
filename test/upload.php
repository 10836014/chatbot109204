<?php
# 檢查檔案是否上傳成功
// var_dump($_FILES['my_file']['error']);
// 可以上傳圖片，但是第二次會報錯

// Notice: Undefined index: my_file in C:\xampp\htdocs\chatbot109204\test\upload.php on line 7
// Notice: Trying to access array offset on value of type null in C:\xampp\htdocs\chatbot109204\test\upload.php on line 7
// Notice: Undefined index: my_file in C:\xampp\htdocs\chatbot109204\test\upload.php on line 26
// Notice: Trying to access array offset on value of type null in C:\xampp\htdocs\chatbot109204\test\upload.php on line 26


// if(isset($_POST["submit"])) {
if ($_FILES['my_file']['error'] === UPLOAD_ERR_OK){
  echo '檔案名稱: ' . $_FILES['my_file']['name'] . '<br/>';
  echo '檔案類型: ' . $_FILES['my_file']['type'] . '<br/>';
  echo '檔案大小: ' . ($_FILES['my_file']['size'] / 1024) . ' KB<br/>';
  echo '暫存名稱: ' . $_FILES['my_file']['tmp_name'] . '<br/>';

  # 檢查檔案是否已經存在
  if (file_exists('upload/' . $_FILES['my_file']['name'])){
    echo '檔案已存在。<br/>';
  } else {
    // $fileName = $_SERVER['DOCUMENT_ROOT'].'/Basic/uploads/'.$_FILES['file']['name']; 
    // move_uploaded_file($_FILES['file']['tmp_name'],$fileName ) 
    $file = $_FILES['my_file']['name'];
    $dest = 'C:/xampp/htdocs/chatbot109204/upload/' . $_FILES['my_file']['name'];
    var_dump($dest);
    # 將檔案移至指定位置
    move_uploaded_file($file, $dest);   
  }
} else {
  echo '錯誤代碼：' . $_FILES['my_file']['error'] . '<br/>';
}

?>
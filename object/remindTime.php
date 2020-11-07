<?php
class RemindTime{
 
    // database connection and table name
    private $conn;
    private $table_name = "remind_time";
 
    // object properties
    public $user_id;
    public $remind_id;
    public $chatroom_id;
    public $remind_time;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function getUserRemindTime(){
    
        // select all query
        $query="SELECT r.chatroom_id,c.habbit_name ,c.user_id, r.remind_time
        FROM chatrooms AS c INNER JOIN remind_time AS r 
        ON c.chatroom_id = r.chatroom_id
        WHERE r.`chatroom_id`= $_POST[chatroom_id]";

        
        // 可以在mysql直接執行
        // $query="SELECT r.`chatroom_id`,c.`habbit_name` ,c.`user_id`, r.`remind_time` 
        // FROM chatrooms AS c INNER JOIN remind_time AS r ON c.`chatroom_id` = r.`chatroom_id` 
        // WHERE r.`chatroom_id`= 2";
        // $query="SELECT `user_name` FROM `users` WHERE user_id='$_POST[user_id]'";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }
}
?>

<?php
class chatroom
{
 
    // database connection and table name
    private $conn;
    private $table_name = "chatrooms";
 
    // object properties
    public $chatroom_id;
    public $user_id;
    public $nick_name;
    public $role_id;
    public $role_name;
    public $habbit_id;
    public $habbit_name;
    public $habbit_photo;
    public $habbit_status;  //進行中、暫停中
    public $signed_time;
    public $completion;
    public $max_completion;
    public $original_intention; //提醒時間 00:00:00
    public $goodness; //完成次數 default=0
    public $badness;  //建立時間 timesteamps
    public $created_at;  //角色照片
    public $updated_at; //習慣分類ID

    
    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readChatRoom()
    {
    
        // select all query
        $query = "SELECT * FROM chatrooms ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }

    public function selectChatroomId()
    {
    
        // select all query
        $query="SELECT * FROM `chatrooms` WHERE user_id='$_POST[user_id]' ORDER BY chatroom_id DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }

    public function readCompletion()
    {
    
        // select all query
        $query="SELECT * FROM `chatrooms` WHERE user_id='$_POST[user_id]' AND habbit_status='養成中' ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }

    public function getUserHistory()
    {
    
        // select all query
        $query="SELECT * FROM `chatrooms` WHERE user_id='$_POST[user_id]' ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }
    
    public function getHabbitName()
    {
    
        // select all query
        $query="SELECT * FROM `chatrooms` WHERE chatroom_id='$_POST[chatroom_id]'";
        // $query="SELECT `user_name` FROM `users` WHERE user_id='$_POST[user_id]'";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }
}

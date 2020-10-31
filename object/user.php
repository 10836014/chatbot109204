<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $user_id;
    public $user_name;
    public $gender;
    public $birthday;
    public $mail;
    public $userPhoto;
    public $created_at;
    public $updated_at;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function readUser(){
    
        // select all query
        $query = "SELECT * FROM users ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }

    function getUserName(){
    
        // select all query
        $query="SELECT * FROM `users` WHERE user_id='$_POST[user_id]'";
        // $query="SELECT `user_name` FROM `users` WHERE user_id='$_POST[user_id]'";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }
}
?>

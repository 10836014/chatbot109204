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
}
?>
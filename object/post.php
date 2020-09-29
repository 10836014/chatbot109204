<?php
class Post{
 
    // database connection and table name
    private $conn;
    private $table_name = "posts";
 
    // object properties
    public $post_id;
    public $user_id;
    public $title;
    public $content;
    public $created_at;
    public $updated_at;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function readPost(){
    
        // select all query
        $query = "SELECT * FROM posts";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }
}
?>
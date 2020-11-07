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
    
        // $query = "SELECT * FROM posts";

        $query="SELECT p.*, u.user_name, h.habbit_cat_name
        FROM posts AS p INNER JOIN users AS u  INNER JOIN habbit_cat AS h 
        ON p.user_id = u.user_id AND p.habbit_id = h.habbit_id ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    function getUserPost(){
    
        // select all query
        // $query = "SELECT * FROM posts";

        $query="SELECT p.*, u.user_name, h.habbit_cat_name
        FROM posts AS p INNER JOIN users AS u  INNER JOIN habbit_cat AS h 
        ON p.user_id = u.user_id AND p.habbit_id = h.habbit_id
        WHERE p.`user_id`= $_POST[user_id]";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    function countLikes(){
    
        // select all query
        // $query = "SELECT * FROM posts";

        $query="SELECT p.*, u.user_name, h.habbit_cat_name, count(l.post_id) AS likesNum
        FROM posts AS p 
        INNER JOIN users AS u  
        INNER JOIN habbit_cat AS h 
        INNER JOIN likes AS l
        ON p.user_id = u.user_id 
        AND p.habbit_id = h.habbit_id 
        AND l.post_id = p.post_id
        GROUP BY p.post_id ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

        return $stmt;
    }
}
?>
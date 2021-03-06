<?php
class Post
{
    // database connection and table name
    private $conn;
    private $table_name = 'posts';

    // object properties
    public $post_id;
    public $user_id;
    public $title;
    public $content;
    public $post_photo;
    public $created_at;
    public $updated_at;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readPost()
    {
        // $query = "SELECT * FROM posts";

        $query = "SELECT p.*, u.user_name, h.habbit_id, h.habbit_cat_name
        FROM posts AS p INNER JOIN users AS u  INNER JOIN habbit_cat AS h 
        ON p.user_id = u.user_id AND p.habbit_id = h.habbit_id ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function getUserPost()
    {
        // select all query
        // $query = "SELECT * FROM posts";

        $query = "SELECT p.*, u.user_name, h.habbit_id, h.habbit_cat_name
        FROM posts AS p INNER JOIN users AS u  INNER JOIN habbit_cat AS h 
        ON p.user_id = u.user_id AND p.habbit_id = h.habbit_id
        WHERE p.`user_id`= $_POST[user_id]";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function countLikes()
    {
        // select all query
        // $query = "SELECT * FROM posts";

        $query = "SELECT p.*, u.user_name, p.habbit_id, habbit_cat_name, count(l.post_id) AS likesNum
        FROM posts AS p 
        INNER JOIN users AS u  
        ON p.user_id = u.user_id
        INNER JOIN habbit_cat AS h
        ON p.habbit_id = h.habbit_id
        LEFT OUTER JOIN likes AS l
        ON l.post_id = p.post_id 
        GROUP BY p.post_id
        ORDER BY p.created_at DESC";

        // 用 LEFT OUTER JOIN 可以顯示出likeNum是0的貼文

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function getHabbitPosts()
    {
        $query = "SELECT p.*, u.user_name, h.habbit_id, h.habbit_cat_name, count(l.post_id) AS likesNum
        FROM posts AS p 
        LEFT OUTER JOIN likes AS l
        ON l.post_id = p.post_id 
        INNER JOIN habbit_cat AS h
        ON p.habbit_id = h.habbit_id
        INNER JOIN users AS u  
        ON p.user_id = u.user_id
        WHERE p.habbit_id= $_POST[habbit_id] 
        GROUP BY p.post_id 
        ORDER BY p.created_at DESC";

        // 用 LEFT OUTER JOIN 可以顯示出likeNum是0的貼文

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}

<?php
class roleCat{
 
    // database connection and table name
    private $conn;
    private $table_name = "role_Cat";
 
    // object properties
    public $role_id;
    public $role_cat_name;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
    
        // select all query
        $query = "SELECT * FROM role_Cat ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }
}
?>
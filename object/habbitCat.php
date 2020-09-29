<?php
class habbitCat{
 
    // database connection and table name
    private $conn;
    private $table_name = "habbit_cat";
 
    // object properties
    public $habbit_id;
    public $habbit_cat_name;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function readHabbitCat(){
    
        // select all query
        $query = "SELECT * FROM habbit_cat ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }
}
?>
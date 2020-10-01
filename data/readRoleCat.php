<?php
    // required headers
    // 取得所有角色清單
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../object/roleCat.php';
    
    // instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();
    
    // initialize object
    $category = new roleCat($db);
    
    // query products //read()是在object的functionName
    $stmt = $category->read();
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if($num>0){
    
        // products array
        $categories_arr=array();
        $categories_arr["records"]=array();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
    
            $category_item=array(
                "role_id" => $role_id,
                "role_cat_name" => $role_cat_name );

            // array_push($categories_arr, $category_item);
            array_push($categories_arr["records"], $category_item);
        }

        //不要顯使重複的值
        $categories_arr=array_unique($categories_arr);
        
        echo json_encode($categories_arr);

    }
    
    else{
        echo json_encode(
            array("message" => "No roleCat found.")
        );
        mysqli_close($category);
    }
?>
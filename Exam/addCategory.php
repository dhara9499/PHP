<?php 
    session_start();
    include_once 'connection.php';
    if(isset($_SESSION['userName'])) {
        if(isset($_POST['btnAddNewCategory'])) {
            insertFunction('category', $_POST['category']);
            header("location: categoryDesign.php");
        }
        
    }
   
    function getParentCategoryName() {
        global $connectionObject;
        $categoryNameQuery = "SELECT title FROM parentCategory";
        $categoryNames = mysqli_query($connectionObject, $categoryNameQuery);
        $categoryName = [];
        foreach($categoryNames as $title => $names) {
            foreach($names as $name) {
                array_push($categoryName, $name);
            }
        }
        return $categoryName;
    }

    function insertFunction($tableName, $insertedValue) {
        global $connectionObject;
        $currentDate = date('Y-m-d');
        $keys = array_keys($insertedValue);
        $values = array_values($insertedValue);
        array_push($keys, 'createdAt');
        array_push($values, $currentDate);
        $keys = implode(', ', $keys);
        $values = implode("', '", $values);
        $insertedQuery = "INSERT INTO $tableName($keys) VALUES('$values')";
        $insertedResult = mysqli_query($connectionObject, $insertedQuery);
    }

?>
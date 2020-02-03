<?php 
    session_start();
    include_once 'connection.php';

    if(isset($_SESSION['userName'])) {
        if(isset($_POST['btnUpdate'])) {
            updateData('category', $_REQUEST['update'], $_POST['category']);
            header("location: categoryDesign.php");
        }
    } else {
        header("location: loginDesign.php");
    }

    function updateData($tableName, $categoryId, $arrayData) {
        global $connectionObject;
        $updateData = '';
        foreach($arrayData as $key => $value) {
            $updateData .= ", $key = '$value'";
            $updateData = ltrim($updateData, ', ');  
        }
        
        $updateQuery = "UPDATE $tableName SET $updateData WHERE categoryId=".$categoryId;
        mysqli_query($connectionObject, $updateQuery);
        return mysqli_affected_rows($connectionObject);
    }

    function fetchData($tableName, $categoryId) {
        global $connectionObject;
        $query = "SELECT title, content, url, metaTitle, parentCategoryId FROM $tableName WHERE categoryId =".$categoryId;

        if($result = mysqli_query($connectionObject, $query)) {
            if(mysqli_num_rows($result) > 0) { 
                foreach($result as $row => $column) {
                    return $column;
                }
            }
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

?>
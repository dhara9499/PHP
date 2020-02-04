<?php 
    session_start();
    include_once 'connection.php';

    if(isset($_SESSION['userName'])) {
        if(isset($_POST['btnUpdate'])) {
            updateData('blogPost', $_REQUEST['update'], $_POST['blog']);
            header("location: blogPostDesign.php");
        }
    } else {
        header("location: loginDesign.php");
    }

    function updateData($tableName, $postId, $arrayData) {
        global $connectionObject;
        $updateData = '';
        foreach($arrayData as $key => $value) {
            $updateData .= ", $key = '$value'";
            $updateData = ltrim($updateData, ', ');  
        }
        
        $updateQuery = "UPDATE $tableName SET $updateData WHERE postId=".$postId;
        mysqli_query($connectionObject, $updateQuery);
        return mysqli_affected_rows($connectionObject);
    }

    function fetchData($tableName, $postId) {
        global $connectionObject;
        $query = "SELECT title, content, url, publishedAt, image FROM $tableName WHERE postId =".$postId;

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
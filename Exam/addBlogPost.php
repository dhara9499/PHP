<?php 
    session_start();
    include_once 'connection.php';
    if(isset($_SESSION['userName'])) {
        if(isset($_POST['btnAddNewCategory'])) {
            $_POST['blog']['userId'] = $_SESSION['userId'];         
            $postId = insertFunction('blogpost', $_POST['blog']);
            $blogPostArray = preparePostCategoryData($_POST['categoryId'], $postId); 
            
            foreach ($blogPostArray as $postCategory) {
                insertFunction('post_category', $postCategory);
            }
            header("location: blogPostDesign.php");          
        }
        
    } else {
        header("location: loginDesign.php");
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

    function preparePostCategoryData($parentCategoryId, $postId) {
        $postArray = [];
        $postCategoryArray = [];
        foreach($parentCategoryId as $categoryId) {
            $postCategoryArray['postId'] = $postId;
            $postCategoryArray['parentCategoryId'] = $categoryId;
            array_push($postArray, $postCategoryArray);
        }
        return $postArray;
    }

    function insertFunction($tableName, $insertedValue) {
        global $connectionObject;
        $keys = implode(', ', array_keys($insertedValue));
        $values = implode("', '", array_values($insertedValue));
        $insertedQuery = "INSERT INTO $tableName($keys) VALUES('$values')";

        $insertedResult = mysqli_query($connectionObject, $insertedQuery);
        $postId = mysqli_insert_id($connectionObject);
        return $postId;
    }

?>




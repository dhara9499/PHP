<?php
    $serverName = $_SERVER['SERVER_NAME'];
    $userName = 'root';
    $password = '';
    $dbName = 'blogpostapplication';

    $connectionObject = mysqli_connect($serverName, $userName, $password, $dbName)
    or 
    die('Couldn\'t connect to the database');
    

    function insertFunction($tableName, $insertArray) {
        global $connectionObject;
        $keys = implode('`, `', array_keys($insertArray));
        $values = implode("', '", array_values($insertArray));
        $insertQuery = "INSERT INTO `$tableName`(`$keys`) VALUES('$values');";
        mysqli_query($connectionObject, $insertQuery);
    }

    function delteRowFunction($tableName, $fieldName, $fieldValue) {
        global $connectionObject;
        $delteQuery = "DELETE FROM $tableName WHERE $fieldName = $fieldValue";
        mysqli_query($connectionObject, $delteQuery);
    }

    function updateFunction($tableName, $updateArray, $fieldName, $fieldValue) {
        global $connectionObject;
        $updateData = '';
        foreach($updateArray as $key => $value) {
            $updateData .= ", $key = '$value'";
        }
        $updateData = ltrim($updateData, ', ');  
        $updateQuery = "UPDATE $tableName SET $updateData WHERE $fieldName = $fieldValue";
        mysqli_query($connectionObject, $updateQuery);
        return mysqli_affected_rows($connectionObject);
    }

    function fetchAll($tableName) {
        global $connectionObject;
        $fetchQuery = "SELECT * FROM $tableName";
        $arrayData = mysqli_query($connectionObject, $fetchQuery);
        $returnArray = [];
        while($row = mysqli_fetch_assoc($arrayData)) {
            array_push($returnArray, $row);
        }
        return $returnArray;
    }

    function fetchRow($tableName, $fieldName, $fieldValue) {
        global $connectionObject;
        $fetchRowQuery = "SELECT * FROM $tableName WHERE $fieldName = '$fieldValue'";
        $returnArray = mysqli_query($connectionObject, $fetchRowQuery);
        $row = mysqli_fetch_assoc($returnArray);
        return $row;
    }

    function fetchField($tableName, $fetchField, $fieldName, $fieldValue) {
        global $connectionObject;
        $fetchRowQuery = "SELECT $fetchField FROM $tableName WHERE $fieldName = '$fieldValue'";
        $returnArray = mysqli_query($connectionObject, $fetchRowQuery);
        $row = mysqli_fetch_assoc($returnArray);
        return $row[$fetchField];
    }

    function checkUserExistOrNot($tableName, $email, $password) {
        global $connectionObject;
        $checkQuery = "SELECT email,password FROM $tableName WHERE email ='" .$email. "'AND password ='" .md5($password). "'";
        return 
            mysqli_num_rows(mysqli_query($connectionObject, $checkQuery))
            ? true
            : false; 
    }

    function getParentCategoryName() {
        global $connectionObject;
        $categoryNameQuery = "SELECT parentCategoryName FROM parentCategory";
        $categoryNames = mysqli_query($connectionObject, $categoryNameQuery);
        $categoryName = [];
        foreach($categoryNames as $title => $names) {
            foreach($names as $name) {
                array_push($categoryName, $name);
            }
        }
        return $categoryName;
    }

    function displayDataForBlog($displayBlogQuery) {
        global $connectionObject;
        $displayBlogArray = [];
        $displayResult = mysqli_query($connectionObject, $displayBlogQuery);
        while($row = mysqli_fetch_assoc($displayResult)) {
            array_push($displayBlogArray, $row);
        }
        return $displayBlogArray;
    }

    function displayDataForCategory($displayCategoryQuery) {
        global $connectionObject;
        $displayCategoryArray = [];
        $displayResult = mysqli_query($connectionObject, $displayCategoryQuery);
        while($rows = mysqli_fetch_assoc($displayResult)) {
            array_push($displayCategoryArray, $rows);
        }
        return $displayCategoryArray;
    }

    function checkEmailExistOrNot($tableName, $email) {
        global $connectionObject;
        $checkQuery = "SELECT email FROM $tableName WHERE email = '$email'";
        $result = mysqli_query($connectionObject, $checkQuery);
        return 
            mysqli_num_rows($result)
            ? true
            : false;      
    } 
?>
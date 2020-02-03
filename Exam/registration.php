<?php 
     include_once 'connection.php';
     include_once 'validations.php';

     function insertFunction($tableName, $insertedValue) {
        global $connectionObject;
        $currentDate = date('Y-m-d');
        $keys = array_keys($insertedValue);
        $values = array_values($insertedValue);
        array_push($keys, 'lastLoginAt');
        array_push($keys, 'createdAt');
        array_push($keys, 'updatedAt');
        array_push($values, $currentDate);
        array_push($values, $currentDate);
        array_push($values, $currentDate);
        $keys = implode(', ', $keys);
        $values = implode("', '", $values);
        $insertedQuery = "INSERT INTO $tableName($keys) VALUES('$values')";
        $insertedResult = mysqli_query($connectionObject, $insertedQuery);
    }

     if(isset($_POST['btnRegistration'])) {
        if ( validation('email', $_POST['registration']['email']) 
        && validation('onlyText', $_POST['registration']['firstName'])
        && validation('onlyText', $_POST['registration']['lastName']) 
        && validation('password', $_POST['registration']['userPassword'])
        && validation('mobile', $_POST['registration']['mobile'])
        && checkPassword($_POST['registration']['userPassword'], $_POST['confirmPassword'])) {
            if(checkEmailExistOrNot('userTable')) {
                echo '<script> alert("Email address already exists ");</script>';
            } else { 
                insertFunction('userTable', $_POST['registration']);
                header ('location:loginDesign.php');
            }
        } 
     }  

     function checkEmailExistOrNot($tableName) {
        global $connectionObject;
        $checkQuery = "SELECT email FROM $tableName WHERE email ='".$_POST["registration"]["email"]."'";
        return 
            mysqli_num_rows(mysqli_query($connectionObject, $checkQuery))
            ? true
            : false;        
    } 
    
?> 

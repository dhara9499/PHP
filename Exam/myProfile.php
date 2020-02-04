<?php 
    session_start();
    include_once 'connection.php';

    if(isset($_SESSION['userName'])) {
        if(isset($_POST['btnUpdate'])) {
            $_SESSION['userName'] = $_POST['registration']['firstName'];
            updateRowData('userTable', $_SESSION['userId'], $_POST['registration']);
            header("location: categoryDesign.php");
        }
    } else {
        header("location: loginDesign.php");
    }
    
    function updateRowData($tableName, $userId, $arrayData) { //
        global $connectionObject;
        $updateData = '';
        foreach($arrayData as $key => $value) {
            $updateData .= ", $key = '$value'";
            $updateData = ltrim($updateData, ', ');  
        }
        $updateQuery = "UPDATE $tableName SET $updateData WHERE userId=".$userId;
        mysqli_query($connectionObject, $updateQuery);
        return mysqli_affected_rows($connectionObject);
    }

    function fetchData($tableName) {
        global $connectionObject;
        $query = "SELECT prefix, firstName, lastName, mobile, email, userPassword, information FROM $tableName WHERE userId =".$_SESSION['userId'];

        if($result = mysqli_query($connectionObject, $query)) {
            if(mysqli_num_rows($result) > 0) { 
                foreach($result as $row => $column) {
                    return $column;
                }
            }
        } 
    }

?>
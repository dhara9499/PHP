<?php   
    include_once 'connection.php';
    session_start();

    if(isset($_POST['btnLogin'])) {
        if(checkUserExistOrNot('userTable', $_POST['emailId'], $_POST['password'])) {
            echo '<script>alert("Login successfully done."); </script>';
            $_SESSION['userName'] = getUserName('userTable', $_POST['emailId']); 
            $_SESSION['userId'] = getUserId('userTable', $_POST['emailId']);           
            header("location: blogPostDesign.php");
        } else {
            echo '<script>alert("Please enter valid emailId and password"); </script>';
        } 
    }

    if(isset($_POST['btnRegistration'])) {
        header("location: registrationDesign.php");
    }

    function checkUserExistOrNot($tableName, $email, $userPassword) {
        global $connectionObject;
        $checkQuery = "SELECT email,userPassword FROM $tableName WHERE email ='" .$email. "'AND userPassword ='" .md5($userPassword). "'";
        return 
            mysqli_num_rows(mysqli_query($connectionObject, $checkQuery))
            ? true
            : false; 
    }

    function getUserName($tableName, $emailId) {
        global $connectionObject; 
        $getName = "SELECT firstName FROM $tableName WHERE email ='".$emailId."'";
        $nameQuery = mysqli_query($connectionObject, $getName);
        $name = mysqli_fetch_assoc($nameQuery);
        return $name['firstName'];
    } 

    function getUserId($tableName, $emailId) {
        global $connectionObject; 
        $getUserId = "SELECT userId FROM $tableName WHERE email ='".$emailId."'";
        $userIdQuery = mysqli_query($connectionObject, $getUserId);
        $userId = mysqli_fetch_assoc($userIdQuery);
        return $userId['userId'];
    } 

?>
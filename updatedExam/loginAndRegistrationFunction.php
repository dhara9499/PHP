<?php 
    include_once 'connection.php';
    include_once 'validations.php';
    
    session_start();
    function prepareRegistrationData($registrationArray) {
        $registrationArray['password'] = md5($registrationArray['password']);
        $registrationArray['createdAt'] = date('d M Y  h:i:A', time());
        return $registrationArray;
    } 

    if(isset($_POST['btnRegistration'])) {
        $validationResult = validation('email', $_POST['registration']['email']) 
                        && validation('onlyText', $_POST['registration']['firstName'])
                        && validation('onlyText', $_POST['registration']['lastName']) 
                        && validation('password', $_POST['registration']['password'])
                        && validation('mobile', $_POST['registration']['mobile'])
                        && checkPassword($_POST['registration']['password'], $_POST['confirmPassword']);
        if ($validationResult) {
            if(checkEmailExistOrNot('user', $_POST['registration']['email'])) {
                echo "<script>alert('Email already exist');</script>";
            } else {
                insertFunction('user', prepareRegistrationData($_POST['registration']));      
                header("location: loginDesign.php");
            } 
        } 
    }  

    if(isset($_POST['btnLogin'])) {
        if(checkUserExistOrNot('user', $_POST['emailId'], $_POST['password'])) {
            echo '<script>alert("Login successfully done."); </script>';
            $_SESSION['userName'] = fetchField('user', 'firstName', 'email', $_POST['emailId']); 
            $_SESSION['userId'] = fetchField('user', 'userId', 'email', $_POST['emailId']);
            
            $userLastLoginAt['lastLoginAt'] = date('d M Y  h:i:A', time());
            updateFunction('user', $userLastLoginAt, 'userId', $_SESSION['userId']);
            header("location: blogPostDesign.php"); 
        } else {
            echo '<script>alert("Please enter valid emailId and password"); </script>';
        } 
    }

    if(isset($_POST['btnRegistrationOfLogin'])) {
        header("location: registrationDesign.php");
    }

    
    
?> 

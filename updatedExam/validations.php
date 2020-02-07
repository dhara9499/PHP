<?php 
    function validation($typeOfData, $value) {
        switch($typeOfData) {
            case 'onlyText':
                return 
                    preg_match('/^[a-zA-Z]+$/', $value) 
                    ? true 
                    : false;
            break;

            case 'email':
                return 
                    preg_match('/^([a-zA-Z0-9\.-]+)@([a-zA-Z0-9-]+).([a-z]{2,8})(.[a-z]{2,8})?/', $value) 
                    ? true
                    : false;
            break;
                        
            case 'textAndNumber':
                return 
                    preg_match('/^[a-zA-Z0-9]+$/', $value) 
                    ? true
                    : false;
            break;

            case 'password':
                return 
                    preg_match('/^[a-zA-Z0-9@_]{7}[a-zA-Z0-9@_]+$/', $value) 
                    ? true
                    : false;
            break;

            case 'mobile':
                return 
                    preg_match('/^[6-9][0-9]{9}$/', $value) 
                    ? true
                    : false;
            break;

        }
    }

    function checkPassword($password, $confirmPassword) {
        return 
            $password == $confirmPassword
            ? true 
            : false;
    }
?>
<?php 

    function validation($fieldName, $fieldValue) {
        switch($fieldName) {
            case 'onlyText':
                return 
                    preg_match('/^[a-zA-Z]+$/', $fieldValue) 
                    ? true 
                    : false;
            break;

            case 'email':
                return 
                    preg_match('/^([a-zA-Z0-9\.-]+)@([a-zA-Z0-9-]+).([a-z]{2,8})(.[a-z]{2,8})?/', $fieldValue) 
                    ? true
                    : false;
            break;

            case 'phoneNumber':
                return 
                    preg_match('/^[6-9][0-9]{9}$/', $fieldValue) 
                    ? true
                    : false;
            break;
            
            case 'textAndNumber':
                return 
                    preg_match('/^[a-zA-Z0-9]+$/', $fieldValue) 
                    ? true
                    : false;
        }
    }


?>
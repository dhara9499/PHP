<?php 

    function getValue($subFormName, $fieldName) { //return value of particular field of any section
        return isset($_GET['update']) 
        ? $subFormName[$fieldName] 
        : '';
    }
 
?>
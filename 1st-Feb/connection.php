<?php
    require_once 'registrationForm.php';
    require_once 'validations.php';
    $serverName = "localhost"; 
    $userName = "root";
    $password = "";
    $dataBaseName = "customer_portal";
    $connection = mysqli_connect($serverName, $userName, $password, $dataBaseName) 
    or
    die("Couldn\'t connect to the database");
 
    function customerData($insertArray) { //return associative array of account section
        $customerArray = [];
        foreach($insertArray as $field => $fieldValue) {
            if(is_array($fieldValue)) {
                $fieldValue = implode(',', $fieldValue);
            }
            $customerArray[$field] = $fieldValue; 
        }
        array_pop($customerArray);
        return $customerArray;
    } 

    function customerAddressData($insertArray) {//return asscociative array of address section
        $customerAddressArray = [];
        foreach($insertArray as $field => $fieldValue) {
            if(is_array($fieldValue)) {
                $fieldValue = implode(',', $fieldValue);
            }
            $customerAddressArray[$field] = $fieldValue;
        }
        return $customerAddressArray;
    }
    
    function customerOtherData($insertArray, $customer_id) { //return associative array of otherdata Section
        $customerOtherArrayForInsert = [];
        $customerOtherArray = [];
        foreach($insertArray as $field => $fieldValue) {
            if(is_array($fieldValue))
            {
                $fieldValue = implode(',',$fieldValue);
            }
            $customerOtherArray['fieldKey'] = $field;
            $customerOtherArray['fieldValue'] = $fieldValue;
            $customerOtherArray['customer_id'] = $customer_id;
            array_push($customerOtherArrayForInsert, $customerOtherArray );
        }
        return $customerOtherArrayForInsert;
    }
    if(isset($_POST['submit'])) {//when submited data inserted     
        if( validation('onlyText', $_POST["account"]["firstName"]) 
            && validation('onlyText', $_POST["account"]["lastName"]) 
            && validation('phoneNumber', $_POST["account"]["phoneNumber"]) 
            && validation('email', $_POST["account"]["email"]) 
            && validation('textAndNumber', $_POST["address"]["addressLine1"]) 
            && validation('textAndNumber', $_POST["address"]["addressLine2"]) 
            && validation('onlyText', $_POST["address"]["country"])) {
                $customer_id = insertFunction('account');
                if(isset($customer_id)) {
                    $address_id = insertFunction('address', $customer_id);
                    $other_information_id = insertFunction('other',$customer_id);
                }  
                header("location: displayTable.php");   
        }
    }

    if(isset($_GET['update'])) { //when updated data will update and show table
        $customer_id = $_GET['update'];
        $accountArray = fetchRow('customers', $customer_id);
        $addressArray = fetchRow('customer_address', $customer_id);
        $otherArray = fetchAll('customer_additional_info', $_GET['update']);
        
        $otherData = [];
        while($row = mysqli_fetch_assoc($otherArray)) {
            $otherData[$row['fieldKey']] = $row['fieldValue']; 
        } 
    } else {
        $accountArray = [];
        $addressArray = [];
        $otherData = [];
    }

    function updateFunction($divisionName) { //called update function and will update
        $customer_id = $_POST['txtid'];
        switch($divisionName) {
            case 'account':
                array_pop($_POST['account']);
                updateRowData('customers', $customer_id, $_POST['account']);
            break;
            case 'address':
                updateRowData('customer_address', $customer_id, $_POST['address']);
            break;
            case 'other':
                $otherArray = customerOtherData($_POST['other'], $customer_id);
                foreach($otherArray as $otherDataArray) {
                    updateRowData('customer_additional_info', $customer_id, $otherDataArray);
                }
            break;
        }

    } 

    if(isset($_POST['btnupdate'])) { //execution of update function
        updateFunction('account');
        updateFunction('address');
        updateFunction('other');
    }

    function insertFunction($divisionName, $customer_id = 0) { //execution of insert function
        switch($divisionName) {
            case 'account':
                $customerArray = customerData($_POST['account']);
                $customer_id = insertData("customers", $customerArray);
                return $customer_id;
            break;

            case 'address' :
                $customerArray = customerAddressData($_POST['address']);
                $customerArray["customer_id"] = $customer_id;
                $id = insertData("customer_address", $customerArray);
                return $id;
            break;

            case 'other' :
                $customerArray = customerOtherData($_POST['other'], $customer_id);
                foreach($customerArray as $value) {
                    $id = insertData("customer_additional_info", $value);
                }   
                return $id;
            break;
        }
    }
    
    function insertData($tableName, $customerArray) { //for insert data into table
        global $connection;

        $keys = implode(',' , array_keys($customerArray));
        $values = (implode("','", array_values($customerArray)));
        
        $insert_query = "INSERT INTO $tableName($keys) Values ('$values');";
        $result = mysqli_query($connection, $insert_query);
        if($tableName == 'customers') {
           return mysqli_insert_id($connection);
        }
    }
        
    function fetchAll($tableName, $customer_id) {
        global $connection;
        $selectQuery = "SELECT * FROM $tableName WHERE customer_id =".$customer_id;
        $result = mysqli_query($connection, $selectQuery);
        return $result;
    }


    function displayTable($selectQuery) {
        global $connection;
        $Rows = [];
        echo '<html>
                <head><link rel="stylesheet" type="text/css" href="table.css"></head>
                <body>
                    <div>
                        <table border="1">';
        if($result = mysqli_query($connection, $selectQuery)) {
            if(mysqli_num_rows($result) > 0) { 
                foreach($result as $row => $column) {   
                    foreach($column as $value) {
                        echo '<td>'.$value.'</td>'; 
                    } 
                    echo "<td><a href='registration.php?update=".$column['customer_id']. "'>Update</a></td>";
                    echo "<td><a href='?delete=".$column['customer_id']. "'>Delete</a></td>";
                    echo "</tr>";
                }
            
            } 
            echo '</table></div></body></html>';   
        } 
    }

    function fetchRow($tableName, $customer_id) { //return single row
        global $connection;
        $rowArray = [];
        $selectQuery = "SELECT * FROM $tableName WHERE customer_id=".$customer_id;
        if($result = mysqli_query($connection, $selectQuery)) {
           $rowArray = mysqli_fetch_assoc($result);
           return $rowArray;
        } 
    }

    if(isset($_REQUEST['delete'])) { //execution of delete function
        deleteRowData($_REQUEST['delete']);
    }


    function deleteRowData($customer_id) { //delete function
        global $connection;
        $deleteQuery = "DELETE FROM customers where customer_id = ".$customer_id;
        $result_delete = mysqli_query($connection, $deleteQuery);
        if ($result_delete) {
            echo '<script>alert(\'Row deleted successfully\');</script>';
        } else {
            echo '<script>alert(\'Row deleted successfully\');</script>';
        }
    }


    function updateRowData($tableName, $customer_id, $arrayData) { //
        global $connection;
        $updateData = '';
        foreach($arrayData as $key => $value) {
            $updateData .= ", $key = '$value'";
            $updateData = ltrim($updateData, ', ');  
        }
        if($tableName == 'customer_additional_info') {
            
            $updateQuery = "UPDATE $tableName SET $updateData WHERE customer_id=$customer_id AND fieldKey ='" .$arrayData['fieldKey'] ."'";
        } else{
            $updateQuery = "UPDATE $tableName SET $updateData WHERE customer_id=".$customer_id;
        }            
        return mysqli_affected_rows($connection);
    }
?>
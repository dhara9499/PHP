<?php 
    session_start();
    include_once 'connection.php';  
    
    if(isset($_SESSION['userName'])) { 

        function displayTable($selectQuery) {
            global $connectionObject;
            $Rows = [];
            echo '<html>
                    <head><link rel="stylesheet" type="text/css" href="table.css"></head>
                    <body>
                        <div>
                            <table border="1">';

           echo '<tr>
                    <th>CategoryId</th>
                    <th>CategoryName</th>
                    <th>Parent Category Name</th>
                    <th>Created Date</th>
                    <th colspan="2"> Actions</th>
                    </tr>';           
            if($result = mysqli_query($connectionObject, $selectQuery)) {
                if(mysqli_num_rows($result) > 0) { 
                    foreach($result as $row => $column) {   
                        foreach($column as $value) {
                            echo '<td>'.$value.'</td>'; 
                        } 
                        echo "<td><a href='updateCategoryDesign.php?update=".$column['categoryId']."'>Update</a></td>";
                        echo "<td><a href='?delete=".$column['categoryId']. "'>Delete</a></td>";
                        echo "</tr>";
                    }
                
                } 
                echo '</table></div></body></html>';   
            } 
        }

        if(isset($_POST['btnAddCategory'])) {
            header("location: addCategoryDesign.php");
        }

        if(isset($_POST['btnMyProfile'])) {
            header("location: myProfileDesign.php");
        }

        if(isset($_POST['btnLogout'])) {
            session_destroy();
            header("location: loginDesign.php");
        }
        
        function deleteRowData($categoryId) { //delete function
            global $connectionObject;
            $deleteQuery = "DELETE FROM category where categoryId = ".$categoryId;
            $result_delete = mysqli_query($connectionObject, $deleteQuery);
            if ($result_delete) {
                echo '<script>alert(\'Row deleted successfully\');</script>';
            } else {
                echo '<script>alert(\'Row deleted successfully\');</script>';
            } 
        }

        if(isset($_REQUEST['delete'])) { //execution of delete function
            deleteRowData($_REQUEST['delete']);
        }

        function updateRowData($tableName, $userId, $arrayData) { //
            global $connectionObject;
            $updateData = '';
            foreach($arrayData as $key => $value) {
                $updateData .= ", $key = '$value'";
                $updateData = ltrim($updateData, ', ');  
            }
            $updateQuery = "UPDATE $tableName SET $updateData WHERE userId=".$userId;
            echo $updateQuery;
            //return mysqli_affected_rows($connectionObject);
        }
    

        if(isset($_REQUEST['update'])) {
            updateRowData('category', $_SESSION['userId'], $_POST['category']);
        }
       
    } else {
        header("location: loginDesign.php");
    }

?>
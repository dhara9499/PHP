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
                    <th>CategoryImage</th>
                    <th>CategoryName</th>
                    <th>Parent Category Name</th>
                    <th>Created Date</th>
                    <th colspan="2"> Actions</th>
                    </tr><tr>';
           
            if($result = mysqli_query($connectionObject, $selectQuery)) {
                if(mysqli_num_rows($result) > 0) { 
                   while($column = mysqli_fetch_assoc($result)) {   
                        echo '<td>'.$column['categoryId'].'</td>';        
                        echo "<td><img src=uploads/".$column['image']." width='40px'; height='40px'></img></td>";
                        echo '<td>'.$column['title'].'</td>';
                        echo '<td>'.$column['parentcategoryname'].'</td>';
                        echo '<td>'.$column['createdAt'].'</td>';
                         
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

        if(isset($_POST['btnBlogPost'])) {
            header("location: blogPostDesign.php");
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

    } else {
        header("location: loginDesign.php");
    }

?>
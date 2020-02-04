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
                    <th>Post Id</th>
                    
                    <th>Title</th>
                    <th>Published At</th>
                    <th colspan="2">Actions</th>  
                  </tr>';
                  if($result = mysqli_query($connectionObject, $selectQuery)) {
                    if(mysqli_num_rows($result) > 0) { 
                       while($column = mysqli_fetch_assoc($result)) {   
                            echo '<td>'.$column['postId'].'</td>';
                            echo '<td>'.$column['title'].'</td>';
                            echo '<td>'.$column['publishedAt'].'</td>';   echo "<td><a href='updateBlogPostDesign.php?update=".$column['postId']."'>Update</a></td>";
                            echo "<td><a href='?delete=".$column['postId']. "'>Delete</a></td>";
                            echo "</tr>";
                        }
                    
                    } 
                    echo '</table></div></body></html>';   
                } 
        }
        if(isset($_POST['btnLogout'])) {
            session_destroy();
            header("location: loginDesign.php");
        }

        if(isset($_POST['btnManageCategory'])) {
            header("location: categoryDesign.php");
        }

        if(isset($_POST['btnAddBlogPost'])) {
            header("location: addBlogPostDesign.php");
        }

        if(isset($_POST['btnMyProfile'])) {
            header("location: myProfileDesign.php");
        }

        function deleteRowData($postId) { //delete function
            global $connectionObject;
            $deleteQuery = "DELETE FROM blogpost where postId = ".$postId;
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
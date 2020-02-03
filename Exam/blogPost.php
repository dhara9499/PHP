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
            if($result = mysqli_query($connectionObject, $selectQuery)) {
                if(mysqli_num_rows($result) > 0) { 
                    foreach($result as $row => $column) {   
                        foreach($column as $value) {
                            echo '<td>'.$value.'</td>'; 
                        } 
                        echo "<td><a href='#'>Update</a></td>";
                        echo "<td><a href='#'>Delete</a></td>";
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
            header("location: profile.php");
        }
       
    }
    

?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title> Blog post </title>
        <meta charset="UTF-8"></meta>
        <link rel="stylesheet" href="blogApplication.css" type="text/css"/>
    </head>
    <?php include_once 'otherFunctions.php';?>
    <body>
        <div>
            <span> Welcome <?php if(isset($_SESSION['userName'])) echo $_SESSION['userName']; ?></span>
        </div>
        <div>
            <h2> Blog Posts </h2>
        </div>
        
        <div>
            <button><a href="addBlogPostDesign.php">Add Blog Post</a></button>
        </div>
        <div>
            <?php displayBlogTable(); ?>
        </div>
        <div>
            <button><a href="categoryDesign.php">ManageCategary</a></button>
            <button><a href="myProfileDesign.php">My Profile</a></button>
            <button><a href="logout.php">Logout</a></button>
         </div>
    </body>
</html>
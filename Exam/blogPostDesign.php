<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title> Blog post </title>
        <meta charset="UTF-8"></meta>
    </head>
    <?php include_once 'blogPost.php'; ?>
    <body>
        <form method="POST">
            <span> Welcome <?php if(isset($_SESSION['userName'])) echo $_SESSION['userName']; ?> </span> <br><br>
            <h2> Blog Posts </h2><br><br>

            <input type="submit" name="btnAddBlogPost" value="Add Blog Post"><br><br>
            <?php if(isset($_SESSION['userName'])) displayTable("SELECT postId, title, publishedAt FROM blogpost"); ?> <br><br><br>
            <input type="submit" name="btnManageCategory" value="ManageCategary">
            <input type="submit" name="btnMyProfile" value="My Profile">
            <input type="submit" name="btnLogout" value="Logout"><br><br>
        </form>
         
    </body>
</html>
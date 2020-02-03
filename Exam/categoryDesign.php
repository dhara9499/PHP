<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title> Blog Category </title>
        <meta charset="UTF-8"></meta>
    </head>
    <?php include_once 'category.php'; ?>
    <body>
        <form method="POST">
            <span> 
                Welcome <?php if(isset($_SESSION['userName'])) echo $_SESSION['userName']; ?>
            </span> <br><br>

            <h2> Blog Category </h2><br><br>

            <input type="submit" name="btnAddCategory" value="Add Categary"><br><br>
            
            <?php 
                if(isset($_SESSION['userName'])) 
                    displayTable("SELECT category.categoryId, category.title,         parentCategory.title as parentcategoryname, category.createdAt 
                    FROM category 
                    INNER JOIN parentcategory  
                    ON category.parentCategoryId = parentcategory.parentCategoryId"); ?> 
            <br><br><br>
            
            <input type="submit" name="btnMyProfile" value="My Profile">
            <input type="submit" name="btnLogout" value="Logout"><br><br>
        </form>
         
    </body>
</html>
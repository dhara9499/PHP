<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Add New Category</title>
        <meta charset="UTF-8"></meta>
    </head>
    <?php include_once 'addCategory.php';?>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <label for="category[title]">Title</label>
            <input type="text" name="category[title]" required/><br><br>

            <label for="category[content]">Content</label>
            <textarea name="category[content]" required></textarea><br><br>

            <label for="category[url]">URL</label>
            <input type="text" name="category[url]" required/><br><br>

            <label for="category[metaTitle]">Meta Title</label>
            <input type="text" name="category[metaTitle]" required/><br><br>

        
            <label for="image">Image</label>
            <input type="file" name="image" required/><br><br>
        
            <label for="category[parentCategory]">Parent Categary</label>
            <input list="parentCategory" name="category[parentCategoryId]"/><br><br>
            <datalist id="parentCategory">
            <?php $categoryName = getParentCategoryName();?>
            <?php for($cnt = 0; $cnt < sizeof($categoryName); $cnt++) : ?>
            <option value="<?php echo ($cnt + 1) ?>"><?php echo $categoryName[$cnt]; ?></option> 
            <?php endfor ?>
            </datalist>
            <br><br>
            <input type="submit" value="Add New Category" name="btnAddNewCategory"/> 
        </form>
    </body>
</html>
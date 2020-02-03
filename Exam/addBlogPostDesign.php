<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Add New Blog Post</title>
        <meta charset="UTF-8"></meta>
    </head>
    <?php include_once 'addBlogPost.php';?>
    <body>
        <form method="POST">
            <label for="blog[title]">Title</label>
            <input type="text" name="blog[title]" required/><br><br>

            <label for="blog[content]">Content</label>
            <textarea name="blog[content]" required></textarea><br><br>

            <label for="blog[url]">URL</label>
            <input type="text" name="blog[url]" required/><br><br>

            <label for="blog[publishedAt]">Published At</label>
            <input type="date" name="blog[publishedAt]" required/><br><br>

        
            <label for="blog[image]">Image</label>
            <input type="file" name="blog[image]" required/><br><br>
        
            <label for="blog[categoryId]">Parent Categary</label>
            
            <select name="blog[categoryId]" multiple> 
            <?php $categoryName = getParentCategoryName();?>
            <?php for($cnt = 0; $cnt < sizeof($categoryName); $cnt++) : ?>
            <option value="<?php echo ($cnt + 1) ?>"><?php echo $categoryName[$cnt]; ?></option> 
            <?php endfor ?>
            </select>
            <br><br>
            <input type="submit" value="Add New Category" name="btnAddNewCategory"/> 
        </form>
    </body>
</html>
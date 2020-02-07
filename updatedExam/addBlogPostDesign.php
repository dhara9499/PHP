<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Add New Blog Post</title>
        <meta charset="UTF-8"></meta>
        <link rel="stylesheet" href="blogApplication.css" type="text/css"/>
    </head>
    <?php include_once 'otherFunctions.php';?>
    <body>
        <form method="POST">
            <div>
                <label for="blog[blogTitle]">Title</label>
                <input type="text" name="blog[blogTitle]" required/>
            </div>
            <div>
                <label for="blog[blogContent]">Content</label>
                <textarea name="blog[blogContent]" required></textarea>
            </div>
            <div>
                <label for="blog[blogUrl]">URL</label>
                <input type="text" name="blog[blogUrl]" required/>
            </div>
            <div>
                <label for="blog[publishedAt]">Published At</label>
                <input type="date" name="blog[publishedAt]" required/>
            </div>
            <div>
                <label for="parentCategoryId">Parent Categary</label>
                <select name="parentCategoryId[]" multiple> 
                <?php $categoryName = getParentCategoryName();?>
                <?php for($cnt = 0; $cnt < sizeof($categoryName); $cnt++) : ?>
                <option value="<?php echo ($cnt + 1) ?>"><?php echo $categoryName[$cnt]; ?></option> 
                <?php endfor ?>
                </select>
            </div>
            <div>
                <input type="submit" value="Add New Blog" name="btnAddNewBlog"/> 
            </div>
        </form>
    </body>
</html>
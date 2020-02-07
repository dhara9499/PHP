<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Add New Category</title>
        <meta charset="UTF-8"></meta>
        <link rel="stylesheet" href="blogApplication.css" type="text/css"/>
    </head>
    <?php include_once 'otherFunctions.php';?>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <div>
                <label for="category[categoryTitle]">Title</label>
                <input type="text" name="category[categoryTitle]" required/>
            </div>
            <div>
                <label for="category[categoryContent]">Content</label>
                <textarea name="category[categoryContent]" required></textarea>
            </div>
            <div>
                <label for="category[categoryUrl]">URL</label>
                <input type="text" name="category[categoryUrl]" required/>
            </div>
            <div>
                <label for="category[categoryMetaTitle]">Meta Title</label>
                <input type="text" name="category[categoryMetaTitle]" required/>
            </div>
            <div>
                <label for="categoryImage">Image</label>
                <input type="file" name="categoryImage" required/>
            </div>
            <div>
                <label for="category[parentCategoryId]">Parent Categary</label>
                <input list="parentCategory" name="category[parentCategoryId]"/>
                <datalist id="parentCategory">
                <?php $categoryName = getParentCategoryName();?>
                <?php for($cnt = 0; $cnt < sizeof($categoryName); $cnt++) : ?>
                <option value="<?php echo ($cnt + 1) ?>"><?php echo $categoryName[$cnt]; ?></option> 
                <?php endfor ?>
                </datalist>
            </div>
            <div>
                <input type="submit" value="Add New Category" name="btnAddNewCategory"/> 
            </div>
        </form>
    </body>
</html>
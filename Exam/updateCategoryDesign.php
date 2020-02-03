<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Update Category</title>
        <meta charset="UTF-8"></meta>
    </head>
    <?php include_once 'updateCategory.php';
        $category = fetchData('category', $_REQUEST['update']);?>
    <body>
        <form method="POST">
            <label for="category[title]">Title</label>
            <input type="text" name="category[title]" value="<?php echo $category['title']; ?>" required/><br><br>

            <label for="category[content]">Content</label>
            <textarea name="category[content]" required><?php echo $category['content']; ?></textarea><br><br>

            <label for="category[url]">URL</label>
            <input type="text" name="category[url]" value="<?php echo $category['url']; ?>" required/><br><br>

            <label for="category[metaTitle]">Meta Title</label>
            <input type="text" name="category[metaTitle]" value="<?php echo $category['metaTitle']; ?>"required/><br><br>

        
            <label for="category[image]">Image</label>
            <input type="file" name="category[image]" required/><br><br>
        
            <label for="category[parentCategory]">Parent Categary</label>
            <input list="parentCategory" name="category[parentCategoryId]" value="<?php echo $category['parentCategoryId']; ?>"/><br><br>
            <datalist id="parentCategory" >
            <?php $categoryName = getParentCategoryName();?>
            <?php for($cnt = 0; $cnt < sizeof($categoryName); $cnt++) : ?>
            
            <option value="<?php echo ($cnt + 1) ?>"><?php echo $categoryName[$cnt]; ?></option> 
            <?php endfor ?>
            </datalist>
            <br><br>
            <input type="submit" value="Update" name="btnUpdate"/> 
        </form>
    </body>
</html>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Update Category</title>
        <meta charset="UTF-8"></meta>
    </head>
    <?php include_once 'updateBlogPost.php';
        $blog = fetchData('blogPost', $_REQUEST['update']);
        ?>
    <body>
        <form method="POST">
            <label for="blog[title]">Title</label>
            <input type="text" name="blog[title]" value="<?php echo $blog['title']; ?>" required/><br><br>

            <label for="blog[content]">Content</label>
            <textarea name="blog[content]" required><?php echo $blog['content']; ?></textarea><br><br>

            <label for="blog[url]">URL</label>
            <input type="text" name="blog[url]" value="<?php echo $blog['url']; ?>" required/><br><br>
        
            <label for="category[image]">Image</label>
            <input type="file" name="category[image]" required/>
            <br><br>
            <input type="submit" value="Update" name="btnUpdate"/> 
        </form>
    </body>
</html>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Update Blog Post</title>
        <meta charset="UTF-8"></meta>
        <link rel="stylesheet" href="blogApplication.css" type="text/css"/>
    </head>
    <?php include_once 'otherFunctions.php';
        $blog = fetchRow('blogPost', 'blogId', $_REQUEST['update']);
        ?>
    <body>
        <form method="POST">
            <div>
                <label for="blog[blogTitle]">Title</label>
                <input type="text" name="blog[blogTitle]" value="<?php echo $blog['blogTitle']; ?>" required/>
            </div>
            <div>
                <label for="blog[blogContent]">Content</label>
                <textarea name="blog[blogContent]" required><?php echo $blog['blogContent']; ?></textarea>
            </div>
            <div>
                <label for="blog[blogUrl]">URL</label>
                <input type="text" name="blog[blogUrl]" value="<?php echo $blog['blogUrl']; ?>" required/>
            </div>
            <div>
                <input type="submit" value="Update" name="btnBlogPostUpdate"/> 
            </div>
        </form>
    </body>
</html>
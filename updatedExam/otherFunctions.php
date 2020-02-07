<?php 
    include_once 'connection.php';
    session_start();

    function getImageData($imageName) {
        if(!empty($_FILES[$imageName])) {
            $name = $_FILES[$imageName]['name'];
            $size = $_FILES[$imageName]['size'];
            $type = $_FILES[$imageName]['type'];
            $tmp_name = $_FILES[$imageName]['tmp_name'];
            $uploadPath = 'uploads/';
            $extension = strtolower(substr($name,strpos($name,'.')+1));
            if(($extension === 'jpeg' || $extension === 'png' || $extension === 'jpg') && ($type === 'image/png' || $type === 'image/jpeg' || $type === 'image/jpg')) {
                    if($size < 3526840) {
                        if(move_uploaded_file($tmp_name,$uploadPath.$name)) {
                            return true;
                        } else {
                            echo "Something want wrong";
                        } 
                    } else {
                        echo "Please select file upto 2 Mb";
                    }
            } else {
                echo "Please select only image file";
            }
        } else {
            echo "Please Select the file";
        }
    }

    function prepareBlogPostData($blogPostArray) {
        $blogPostArray['createdAt'] = date('d M Y  h:i:A', time());
        $blogPostArray['userId'] = $_SESSION['userId'];
        return $blogPostArray;
    }

    function preparePostCategoryData($postCategoryArray, $postId) {
        $insertPostCategory2DArray = [];
        $insertPostCategory1DArray = [];
        foreach ($postCategoryArray as $key => $value) {
            $insertPostCategory1DArray['parentCategoryId'] = $value;
            $insertPostCategory1DArray['blogId'] = $postId;

            array_push($insertPostCategory2DArray, $insertPostCategory1DArray);
        }
        return $insertPostCategory2DArray;
    }

    function prepareCategoryData($categoryArray) {
        $categoryArray['createdAt'] =  date('d M Y  h:i:A', time());
        return $categoryArray;
    }

    function displayBlogTable() {
        $blogArray = displayDataForBlog("SELECT
                                            B.blogId, B.blogTitle, B.publishedAt,
                                            GROUP_CONCAT(C.parentCategoryName SEPARATOR ',') AS category
                                            FROM
                                            postcatgory P
                                        INNER JOIN blogpost B ON
                                            B.blogId = P.blogId
                                        INNER JOIN parentcategory C ON
                                            C.parentCategoryId = P.parentCategoryId
                                        GROUP BY
                                            p.blogId ");                                    
        echo '<table border="1">';
        echo '<tr>
                <th>Blog Post Id</th>
                <th>Category Name</th>
                <th>Title</th>
                <th>Published Date</th>
                <th colspan="2">Actions</th>
             </tr>';
        foreach($blogArray as $row) {
            echo"<tr>";
            echo "<td>".$row['blogId']."</td>";
            echo "<td>".$row['category']."</td>";
            echo "<td>".$row['blogTitle']."</td>";
            echo "<td>".$row['publishedAt']."</td>";
            echo "<td><a href='updateBlogPostDesign.php?update=".$row['blogId']."'>Update</a></td>";
            echo "<td><a href='?delete=".$row['blogId']. "'>Delete</a></td>";
            echo "</tr>";
        }
        echo '</table>'; 
    }

    function displayCategoryTable() {
        $categoryArray = displayDataForCategory("SELECT c.categoryId, c.categoryImage,                                                 p.parentCategoryName AS categoryName,                                                 c.createdAt FROM category c INNER JOIN                                                parentcategory p ON c.parentCategoryId =                                              p.parentCategoryId");
        echo '<table border="1">';
        echo '<tr>
                <th>CategoryId</th>
                <th>Category Image</th>
                <th>Category Name</th>
                <th>CreatedAt</th>
                <th colspan="2">Actions</th>
             </tr>';
        foreach($categoryArray as $row) {
            echo"<tr>";
            echo "<td>".$row['categoryId']."</td>";
            echo "<td><img src=uploads/".$row['categoryImage']." width='40px'; height='40px'></img></td>";
            echo "<td>".$row['categoryName']."</td>";
            echo "<td>".$row['createdAt']."</td>";
            echo "<td><a href='updateCategoryDesign.php?update=".$row['categoryId']."'>Update</a></td>";
            echo "<td><a href='?categoryDelete=".$row['categoryId']. "'>Delete</a></td>";
            echo "</tr>";
        }
        echo '</table>';
    } 

    if(isset($_SESSION['userName'])) {
        if(isset($_POST['btnAddNewBlog'])) {
            insertFunction('blogpost', prepareBlogPostData($_POST['blog']));
            $postId = mysqli_insert_id($connectionObject);
            $blogPostArray = preparePostCategoryData($_POST['parentCategoryId'], $postId);
            foreach ($blogPostArray as $postCategory) {
                insertFunction('postcatgory', $postCategory);
            }
            header("location: blogPostDesign.php");
        }
        if(isset($_REQUEST['delete'])) {
            delteRowFunction('blogPost', 'blogId', $_REQUEST['delete']);
        }

        if(isset($_POST['btnBlogPostUpdate'])) {
            $_POST['blog']['updatedAt'] = date('d M Y  h:i:A', time());
            updateFunction('blogpost', $_POST['blog'], 'blogId', $_REQUEST['update']);
            header("location: blogPostDesign.php");
        }

        if(isset($_POST['btnMyProfileUpdate'])) {
            $_POST['registration']['updatedAt'] = date('d M Y  h:i:A', time());
            updateFunction('user', $_POST['registration'], 'userId', $_SESSION['userId']);
            $_SESSION['userName'] = $_POST['registration']['firstName'];
            header("location: blogPostDesign.php");
        }

        if(isset($_POST['btnAddNewCategory'])) {
            if(getImageData('categoryImage')) {
                $_POST['category']['categoryImage'] = $_FILES['categoryImage']['name'];
                insertFunction('category', prepareCategoryData($_POST['category']));
                header("location: categoryDesign.php");
    
            }
        }

        if(isset($_POST['btnCategoryUpdate'])) {
            $_POST['category']['updatedAt'] = date('d M Y  h:i:A', time());
            updateFunction('category', $_POST['category'], 'categoryId', $_REQUEST['update']);
            header("location: categoryDesign.php");
        }

        if(isset($_REQUEST['categoryDelete'])) {
            delteRowFunction('category', 'categoryId', $_REQUEST['categoryDelete']);
        }

    } else {
        header("location: loginDesign.php");
    }
    

?>
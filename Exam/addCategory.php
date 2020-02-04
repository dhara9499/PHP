<?php 
    session_start();
    include_once 'connection.php';
    if(isset($_SESSION['userName'])) {
        if(isset($_POST['btnAddNewCategory'])) {
            if(getImageData()) {
                $_POST['category']['image'] =  $_FILES['image']['name'];
                 insertFunction('category', $_POST['category']);
                 header("location: categoryDesign.php");
            }
            
        }
        
    } else {
        header("location: loginDesign.php");
    }
   
    function getParentCategoryName() {
        global $connectionObject;
        $categoryNameQuery = "SELECT title FROM parentCategory";
        $categoryNames = mysqli_query($connectionObject, $categoryNameQuery);
        $categoryName = [];
        foreach($categoryNames as $title => $names) {
            foreach($names as $name) {
                array_push($categoryName, $name);
            }
        }
        return $categoryName;
    }

    function insertFunction($tableName, $insertedValue) {
        global $connectionObject;
        $currentDate = date('Y-m-d');
        $keys = array_keys($insertedValue);
        $values = array_values($insertedValue);
        array_push($keys, 'createdAt');
        array_push($values, $currentDate);
        $keys = implode(', ', $keys);
        $values = implode("', '", $values);
        $insertedQuery = "INSERT INTO $tableName($keys) VALUES('$values')";
        echo $insertedQuery;
        $insertedResult = mysqli_query($connectionObject, $insertedQuery);
    }

    function getImageData() {
        if(!empty($_FILES['image'])) {
            $name = $_FILES['image']['name'];
            $size = $_FILES['image']['size'];
            $type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $uploadPath = 'uploads/';
            $extension = strtolower(substr($name,strpos($name,'.')+1));
            if(($extension === 'jpeg' || $extension === 'png' || $extension === 'jpg') && ($type === 'image/png' || $type === 'image/jpeg' || $type === 'image/jpg')) {
                    if($size < 3526840) {
                        if(move_uploaded_file($tmp_name,$uploadPath.$name)) {
                            echo "File Uploaded";
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
?>
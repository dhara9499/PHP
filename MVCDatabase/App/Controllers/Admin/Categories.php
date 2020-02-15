<?php 

    namespace App\Controllers\Admin;
    use Core\View;
    use Core\Controller;
    use App\Models\Admin\Categories as categoriesModel;

    class Categories extends \Core\Controller {

        public function add() {
            
            $parentCategories = categoriesModel::getParentCategoryName();
            View::renderTemplate("Admin/addNewCategory.html", ['parentCategories' => $parentCategories]);
        }

        public function addCategory() {
            $categoryData = Controller::prepareData($_POST['category']);
            if($this->getImageData('categoryImage')) {
                if(categoriesModel::isProductUrlKey($_POST['category']['urlKey'])) {
                    categoriesModel::insertCategoryData($categoryData);
                    header("location: /Admin/Categories");
                } else {
                    echo '<script>alert(\' url key already exists\');</script>';
                    View::renderTemplate("Admin/addNewCategory.html");
                }
            }
        }

        public function edit() {
            $categoryID = $this->route_params['id'];
            $_SESSION['categoryID'] = $categoryID;
            $parentCategories = categoriesModel::getParentCategoryName();
            $categoryData = categoriesModel::getRowDataFromDB($categoryID);
            View::renderTemplate("Admin/updateCategory.html", ['category' => $categoryData, 'parentCategories' => $parentCategories]);
        }

        public function editCategoryData() {
            if(isset($_POST['btnUpdateCategory'])) {
                $categoryData = Controller::prepareData($_POST['category']);
                categoriesModel::editCategory($categoryData, $_SESSION['categoryID']);
            }
            header("location: /Admin/Categories");
        }

        public function Delete() {
            $categoryID = $_GET['categoryID'];
            categoriesModel::deleteCategory($categoryID);
            header("location: /Admin/Categories");
        }

        public function getImageData($imageName) {
        
            if(!empty($_FILES[$imageName])) {
                $name = $_FILES[$imageName]['name'];
                $size = $_FILES[$imageName]['size'];
                $type = $_FILES[$imageName]['type'];
                $tmp_name = $_FILES[$imageName]['tmp_name'];
                $uploadPath = 'images/category/';
                $extension = strtolower(substr($name,strpos($name,'.')+1));
                if(($extension === 'jpeg' || $extension === 'png' || $extension === 'jpg') && ($type === 'image/png' || $type === 'image/jpeg' || $type === 'image/jpg')) {
                        if($size < 3526840) {
                            if(move_uploaded_file($tmp_name, $uploadPath.$name)) {
                                return true;
                            } else {
                                echo "Something went wrong";
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
    }
<?php 

    namespace App\Controllers\Admin;
    use Core\View;
    use Core\Controller;
    use App\Models\Admin\Products as productsModel;
    
    class Products extends \Core\Controller {

        protected function before() {
            if(isset($_SESSION['userName'])) {
                return true;
            } else {
                return false;
            }
        }

        public function addAction() {
            $categories = productsModel::getDataFromDB('categories');
            View::renderTemplate("Admin/addNewProduct.html", ['categories' => $categories]);
        }

        public function addProductAction() {
            $productData = productsModel::prepareProductData($_POST['product'], $_FILES['product']['name']['productImage']);
            if(($this->getImageData('productImage') && productsModel::isUniqueUrl($_POST['product']['urlKey']) && productsModel::isUniqueSKU($_POST['product']['SKU']))) {
                $productID = productsModel::insertProductData('products', $productData);
                $pcData = productsModel::prepareProductCategoriesData($_POST['categoryID'], $productID);
                productsModel::insertProductData('product_categories', $pcData);
                header("location: /Admin/Products");
            } else {
                echo '<script>alert(\' Please enter unique url key and SKU\');</script>';
                View::renderTemplate("Admin/addNewProduct.html");
            }
        }

        public function editAction() {
            $productID = $this->route_params['id'];
            $_SESSION['productID'] = $productID;
            $productData = productsModel::getRowDataFromDB($productID);
            View::renderTemplate("Admin/updateProduct.html", ['product' => $productData]);
        }

        public function editProductDataAction() {
            if(isset($_POST['btnUpdateProduct'])) {
                $productData = productsModel::prepareProductData($_POST['product'], $_FILES['product']['name']['productImage']);
                productsModel::editProductData($productData, $_SESSION['productID']);
            }
            header("location: /Admin/Products");
        }

        public function DeleteAction() {
            $productID = $_GET['productID'];
            productsModel::deleteProductData($productID);
            header("location: /Admin/Products");
        }

        public function getImageData($imageName) {
        
            if(!empty($_FILES['product']['name'][$imageName])) {
                $name = $_FILES['product']['name'][$imageName];
                $size = $_FILES['product']['size'][$imageName];
                $type = $_FILES['product']['type'][$imageName];
                $tmp_name = $_FILES['product']['tmp_name'][$imageName];
                $uploadPath = 'images/product/';
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
?>
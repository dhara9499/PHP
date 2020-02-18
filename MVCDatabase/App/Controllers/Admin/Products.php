<?php 

    namespace App\Controllers\Admin;
    use Core\View;
    use Core\Controller;
    use App\Models\Admin\Products as productsModel;
    
    class Products extends \Core\Controller {

        public function add() {
            $categories = productsModel::getDataFromDB('categories');
            View::renderTemplate("Admin/addNewProduct.html", ['categories' => $categories]);
        }

        public function prepareProductData($productData) {
            $productData = Controller::prepareData($productData);
            $productData['productStatus'] === 'on' 
            ? $productData['productStatus'] = 1 
            : $productData['productStatus'] = 0;
            return $productData;
        }

        public function prepareProductCategoriesData($categoryID, $productID) {
            $pcData = [];
            $pcData['productID'] = $productID;
            $pcData['categoryID'] = $categoryID;
            return $pcData;
        }

        public function addProduct() {
            $productData = $this->prepareProductData($_POST['product']);
            $productData['productImage'] = $_FILES['product']['name']['productImage'];
            if(($this->getImageData('productImage') && productsModel::isUniqueUrl($_POST['product']['urlKey']) && productsModel::isUniqueSKU($_POST['product']['SKU']))) {
                $productID = productsModel::insertProductData('products', $productData);
                $pcData = $this->prepareProductCategoriesData($_POST['categoryID'], $productID);
                productsModel::insertProductData('product_categories', $pcData);
                
                header("location: /Admin/Products");
            } else {
                echo '<script>alert(\' Please enter unique url key and SKU\');</script>';
                View::renderTemplate("Admin/addNewProduct.html");
            }
        }

        public function edit() {
            $productID = $this->route_params['id'];
            $_SESSION['productID'] = $productID;
            $productData = productsModel::getRowDataFromDB($productID);
            View::renderTemplate("Admin/updateProduct.html", ['product' => $productData]);
        }

        public function editProductData() {
            if(isset($_POST['btnUpdateProduct'])) {
                $productData = Controller::prepareData($_POST['product']);
                $productData['productStatus'] == 'on' 
                ? $productData['productStatus'] = 1 
                : $productData['productStatus'] = 0;
                productsModel::editProductData($productData, $_SESSION['productID']);
            }
            header("location: /Admin/Products");
        }

        public function Delete() {
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
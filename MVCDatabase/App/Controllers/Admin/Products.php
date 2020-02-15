<?php 

    namespace App\Controllers\Admin;
    use Core\View;
    use Core\Controller;
    use App\Models\Admin\Products as productsModel;
    
    class Products extends \Core\Controller {

        public function add() {
            View::renderTemplate("Admin/addNewProduct.html");
        }

        public function addProduct() {
            $productData = Controller::prepareData($_POST['product']);
            if(productsModel::isProductUrlKey($_POST['product']['urlKey'])) {
                productsModel::insertProductData($productData);
                header("location: /Admin/Products");
            } else {
                echo '<script>alert(\' url key already exists\');</script>';
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
                productsModel::editProduct($productData, $_SESSION['productID']);
            }
            header("location: /Admin/Products");
        }

        public function Delete() {
            $productID = $_GET['productID'];
            productsModel::deleteProduct($productID);
            header("location: /Admin/Products");
        }
    }


?>
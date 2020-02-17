<?php 

    namespace App\Controllers\Admin;
    use Core\View;
    use Core\Controller;
    use App\Models\Admin\Products as productsModel;
    use App\Models\Admin\Categories as categoriesModel;
    
    class Products extends \Core\Controller {

        public function add() {
            $parentCategories = categoriesModel::getParentCategoryName();
            View::renderTemplate("Admin/addNewProduct.html", ['parentCategories' => $parentCategories]);
        }

        public function prepareProductData($productData) {
            $productData = Controller::prepareData($productData);
            $productData['productStatus'] === 'on' 
            ? $productData['productStatus'] = 1 
            : $productData['productStatus'] = 0;
            return $productData;
        }

        public function prepareProductCategoriesData($parentCategories, $productID) {
            $pcDataOneDimensional = [];
            $pcDataTwoDimensional = [];
            foreach($parentCategories as $parentCategory => $value) {
                $pcDataOneDimensional['productID'] = $productID;
                $pcDataOneDimensional['parentCategoryID'] = $value;
                array_push($pcDataTwoDimensional, $pcDataOneDimensional);
            }
            return $pcDataTwoDimensional;
        }

        public function addProduct() {
            
            $productData = $this->prepareProductData($_POST['product']);
            if((productsModel::isUniqueUrl($_POST['product']['urlKey']) &&             productsModel::isUniqueSKU($_POST['product']['SKU']))) {
                $productID = productsModel::insertProductData('products', $productData);
                $pcData = $this->prepareProductCategoriesData($_POST['parentCategoryID'], $productID);
                foreach($pcData as $key => $value) {
                    productsModel::insertProductData('product_categories', $value);
                }
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
    }


?>
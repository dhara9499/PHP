<?php 
    namespace App\Models\Admin;
    use \Core\Model;

    class Products extends \Core\Model {
        
        public function insertProductData($productData) {
            Model::insertData('products', $productData);
        }

        public function getDataFromDB() {
            $productData = Model::fetchAll('products');
            return $productData;
        }

        public function getRowDataFromDB($productID) {
            $productData = Model::fetchRow('products', 'productID', $productID);
            return $productData;
        }

        public function deleteProduct($productID) {
            Model::deleteData('products', 'productID', $productID);
        }

        public function editProduct($data, $productID) {
            Model::updateData('products', $data, 'productID', $productID);
        }

        public function isProductUrlKey($urlKey) {
            return (Model::isUrlExists('products', 'urlKey', $urlKey)) ? true : false; 
        }
    }
?>
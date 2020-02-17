<?php 
    namespace App\Models\Admin;
    use \Core\Model;
    use PDO;

    class Products extends \Core\Model {

        public function insertProductData($tableName, $productData) {
            Model::insertData($tableName, $productData);
            $db = Model::getDB();
            $productID = $db->lastInsertId();
            return $productID;
        }

        public function editProductData($productData, $productID) {
            Model::updateData('products', $productData, 'productID', $productID);
        }

        public function deleteProductData($productID) {
            Model::deleteData('products', 'productID', $productID);
        }

        public function isUniqueUrl($urlKey) {
            return Model::isUnique('products', 'urlKey', $urlKey) ? true : false; 
        }

        public function isUniqueSKU($SKU) {
            return Model::isUnique('products', 'SKU', $SKU) ? true : false; 
        }

        public function getDataFromDB() {
            $productData = Model::fetchAll('products');
            return $productData;
        }

        public function getRowDataFromDB($productID) {
            $productData = Model::fetchRow('products', 'productID', $productID);
            return $productData;
        }
    }
?>
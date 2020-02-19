<?php 
    namespace App\Models\Admin;
    use \Core\Model;
    use PDO;

    class Products extends \Core\Model {

        public function prepareProductData($productData, $imageName) {
            $preparedData = Model::prepareData($productData);
            $preparedData['productStatus'] === 'on' 
            ? $preparedData['productStatus'] = 1 
            : $preparedData['productStatus'] = 0;
            $preparedData['productImage'] = $imageName;
            return $preparedData;
        }

        public function prepareProductCategoriesData($categoryID, $productID) {
            $pcData = [];
            $pcData['productID'] = $productID;
            $pcData['categoryID'] = $categoryID;
            return $pcData;
        }

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
            return Model::isUnique('products', 'urlKey', $urlKey) ? false : true; 
        }

        public function isUniqueSKU($SKU) {
            return Model::isUnique('products', 'SKU', $SKU) ? false : true; 
        }

        public function getDataFromDB($tableName) {
            $productData = Model::fetchAll($tableName);
            return $productData;
        }

        public function getRowDataFromDB($productID) {
            $productData = Model::fetchRow('products', 'productID', $productID);
            return $productData;
        }
    }
?>
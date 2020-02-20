<?php

    namespace App\Models;
    use Core\Model;
    use PDO;

    class cart extends \Core\Model {

        public function prepareCartData($userID, $data) {
            
            $cartData['userID'] = $userID;
            $cartData['totalAmount'] = ($data['quantity'] * $data['totalAmount']);
            return $cartData;   
        }

        public function prepareCartItemData($cartID, $data) {
            $cartItemData['productID'] = $data['productID']; 
            $cartItemData['price'] = $data['totalAmount'];
            $cartItemData['cartID'] = $cartID;
            $cartItemData['quantity'] = $data['quantity'];
            return $cartItemData;
        }

        public function prepareUpdateCartData($price) {
            $cartData['totalAmount'] = $price;
            return $cartData;
        }

        public function prepareUpdateCartItemData($quantity) {
            $cartItemData['quantity'] = $quantity;
            return $cartItemData;
        }

        public function insertCartData($tableName, $cartData) {
            Model::insertData($tableName, $cartData);
            $db = Model::getDB();
            $cartID = $db->lastInsertId();
            return $cartID;
        }

        public function isCartExistAndActive($userID) {
            $db = Model::getDB();
            $stmt = $db->query("SELECT * FROM cart WHERE userID = $userID AND cartStatus = 1");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function isProductExists($productID) {
            $result = Model::fetchRow('cartitem', 'productID', $productID);
            return $result;
        }

        public function updateCartItemData($tableName, $cartItemData, $fieldName, $productID){
            Model::updateData($tableName, $cartItemData, $fieldName, $productID);
        }
    }

?>
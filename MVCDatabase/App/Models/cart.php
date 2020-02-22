<?php

    namespace App\Models;
    use Core\Model;
    use PDO;

    class cart extends \Core\Model {

        public function prepareCartData($userID, $data) {
            $cartData['userID'] = $userID;
            $cartData['totalAmount'] = ($data['quantity'] * $data['price']);
            return $cartData;   
        }

        public function prepareCartItemData($cartID, $data) {
            $cartItemData['productID'] = $data['productID']; 
            $cartItemData['price'] = $data['price'];
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

        public function getCartItemDataFromDB($cartID) {
            $db = Model::getDB();
            $stmt = $db->query("SELECT * FROM cartitem WHERE cartID = $cartID");
            $cartItemData = Model::fetchAll('cartitem');
            return $cartItemData;
        }

        public function getCartData($cartID) {
            $cartData = Model::fetchRow('cart', 'cartID', $cartID);
            return $cartData;
        }

        public function insertCartData($tableName, $cartData) {
            Model::insertData($tableName, $cartData);
            $db = Model::getDB();
            $cartID = $db->lastInsertId();
            return $cartID;
        }

        public function isProductExists($productID) {
            $result = Model::fetchRow('cartitem', 'productID', $productID);
            return $result;
        }

        public function updateCartItemData($tableName, $cartItemData, $fieldName, $productID){
            Model::updateData($tableName, $cartItemData, $fieldName, $productID);
        }

        
        public function getCartItemCount($cartID) {
            $db = Model::getDB();
            

                $cartID = $_SESSION['cartID'];
                $stmt = $db->query("SELECT COUNT(quantity) FROM cartitem WHERE cartID = $cartID");
                $cartItemData = $stmt->fetch(PDO::FETCH_ASSOC);
                $value = implode($cartItemData);
                $result = $value;
            } else {
                $result=0;
            }
            echo $result;
        }
    }

?>
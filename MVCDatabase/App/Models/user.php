<?php 

    namespace App\Models;
    use Core\Model;
    use PDO;

    class user extends \Core\Model {

        public function isUserExist($name, $password) {
            $db = Model::getDB();
            $stmt = $db->query("SELECT * FROM user WHERE `name` = '$name' AND `password` = '$password'");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function prepareCartData($userID) {
            $cartData['userID'] = $userID;
            return $cartData;
        }

        public function insertCartData($cartData) {
            Model::insertData('cart', $cartData);
            $db = Model::getDB();
            $cartID = $db->lastInserId();
            return $cartID;
        }

        public function isCartExist ($cartID) {
            $db = Model::getDB();
            $stmt = $db->query("SELECT * FROM cart WHERE cartID = $cartID AND cartStatus = 1");
            $cartData = $stmt->fetch(PDO::FETCH_ASSOC);
            return $cartData; 
        }
    }




?>
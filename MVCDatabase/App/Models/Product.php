<?php 
    namespace App\Models;
    use Core\Model;
    use PDO;

    class Product extends \Core\Model {
        public function getProductDetails($urlKey) {
            $db = Model::getDB();
            $stmt = $db->query("SELECT productID, productName, productPrice, productImage, shortDescription FROM products WHERE urlKey = '$urlKey'");
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        }
    }


?>
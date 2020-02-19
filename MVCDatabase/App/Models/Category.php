<?php 
    namespace App\Models;
    use PDO;
    use Core\Model;
    
    class Category extends \Core\Model {
        
        public function getProductData($urlKey) {
            $db = Model::getDB();
            $stmt = $db->query(" SELECT
                                    p.productName, p.urlKey, p.productImage, 
                                    p.productPrice, p.shortDescription
                                FROM
                                    products p
                                INNER JOIN product_categories pc ON
                                    p.productID = pc.productID
                                INNER JOIN categories c ON
                                    c.categoryID = pc.categoryID AND c.urlKey = '$urlKey' AND p.productStatus = '1'");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } 
    }



?>
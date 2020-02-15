<?php 
    namespace App\Models\Admin;
    use Core\Model;
    use PDO;

    class Categories extends \Core\Model {
        
        public function insertCategoryData($categoryData) {
            Model::insertData('categories', $categoryData);
        }
        public function showCategoryData() {
            $db = Model::getDB();
            $stmt = $db->query("SELECT
                                    c.categoryID,
                                    c.categoryName,
                                    c.urlKey,
                                    c.categoryImage,
                                    c.categoryStatus,
                                    c.categoryDescription,
                                    p.parentCategoryName
                                FROM
                                    categories c
                                LEFT JOIN parentCategory p ON
                                    c.parentCategoryID = p.parentCategoryID");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
        public function getDataFromDB() {
            $productData = Model::fetchAll('products');
            return $productData;
        }

        public function getRowDataFromDB($categoryID) {
            $categoryData = Model::fetchRow('categories', 'categoryID', $categoryID);
            return $categoryData;
        }

        public function deleteCategory($categoryID) {
            Model::deleteData('categories', 'categoryID', $categoryID);
        }

        public function editCategory($data, $categoryID) {
            Model::updateData('categories', $data, 'categoryID', $categoryID);
        }

        public function getParentCategoryName() {
            $parentCategoryData = Model::fetchAll('parentCategory');
            return $parentCategoryData;
        }

        public function isProductUrlKey($urlKey) {
            return (Model::isUrlExists('categories', 'urlKey', $urlKey)) ? true : false; 
        }
    }
?>
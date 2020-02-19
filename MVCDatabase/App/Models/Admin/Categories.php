<?php 
    namespace App\Models\Admin;
    use Core\Model;
    use PDO;

    class Categories extends \Core\Model {
        
        public function preparaCategoryData($categoryData, $imageName) {
            $preparedData = Model::prepareData($categoryData);
            $preparedData['categoryStatus'] === 'on'
            ? ($preparedData['categoryStatus'] = 1)
            : $preparedData['categoryStatus'] = 0;
            $categoryData['categoryImage'] = $imageName;
            return $preparedData;
        }

        public function insertCategoryData($categoryData) {
            Model::insertData('categories', $categoryData);
        }

        public function getRowDataFromDB($categoryID) {
            $categoryData = Model::fetchRow('categories', 'categoryID', $categoryID);
            return $categoryData;
        }

        public function editCategoryData($categoryData, $categoryID) {
            Model::updateData('categories', $categoryData, 'categoryID', $categoryID);
        }
        public function deleteCategoryData($categoryID) {
            Model::deleteData('categories', 'categoryID', $categoryID);
        }

        public function isUniqueUrl($urlKey) {
            return Model::isUnique('categories', 'urlKey', $urlKey) ? false : true; 
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

        public function getParentCategoryName() {
            $parentCategoryData = Model::fetchAll('parentCategory');
            return $parentCategoryData;
        }
    }
?>
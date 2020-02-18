<?php 
    namespace App\Models;
    use Core\Model;
    use PDO;

    class Home extends \Core\Model {

        public function getDataFromDB($tableName) {
            $menuContent = Model::fetchAll($tableName);
            return $menuContent;
        }

        public function getRowDataFromDB($urlKey) {
            $urlKeyContent = Model::fetchRow('cms_pages', 'urlKey', $urlKey);
            return $urlKeyContent;
        }

        public function getCategoryList($parentCategoryID) {
            $db = Model::getDB();
            $stmt = $db->query("SELECT
                                    pc.parentCategoryID,
                                    pc.parentCategoryName,
                                    c.categoryName
                                FROM
                                    categories c
                                INNER JOIN parentcategory pc ON
                                c.parentCategoryID = pc.parentCategoryID 
                                AND 
                                c.parentCategoryID = $parentCategoryID");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }



?>
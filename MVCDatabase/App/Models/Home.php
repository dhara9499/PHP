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
    }



?>
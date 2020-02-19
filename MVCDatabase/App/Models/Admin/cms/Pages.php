<?php 
    namespace App\Models\Admin\cms;
    use Core\Model;
    use PDO;

    class Pages extends \Core\Model {

        public function prepareCMSPageData($CMSPageData) {
            $preparedData = Model::prepareData($CMSPageData);
            $preparedData['pageStatus'] === 'on' 
            ? $preparedData['pageStatus'] = 1 
            : $preparedData['pageStatus'] = 0 ;
            return $preparedData;
        }

        public function insertCMSPageData($CMSPageData) {
            Model::insertData('cms_pages', $CMSPageData);
        }
        
        public function editCMSPage($CMSPageData, $pageID) {
            Model::updateData('cms_pages', $CMSPageData, 'pageID', $pageID);
        }

        public function deleteCMSPage($pageID) {
            Model::deleteData('cms_pages', 'pageID', $pageID);
        }

        public function isUniqueUrl($urlKey) {
            return Model::isUnique('cms_pages', 'urlKey', $urlKey) ? true : false; 
        }

        public function getDataFromDB() {
            $CMSPageData = Model::fetchAll('cms_pages');
            return $CMSPageData;
        }
    
        public function getRowDataFromDB($pageID) {
            $CMSPageData = Model::fetchRow('cms_pages', 'pageID', $pageID);
            return $CMSPageData;
        }
    
    }
?>
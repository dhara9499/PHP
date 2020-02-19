<?php 

    namespace App\Controllers\Admin\cms;
    use Core\View;
    use Core\Controller;
    use App\Models\Admin\CMS\Pages as pagesModel;

    class Pages extends \Core\Controller {

        protected function before() {
            if(isset($_SESSION['userName'])) {
                return true;
            } else {
                return false;
            }
        }


        public function addAction() {
            View::renderTemplate("/Admin/addNewCMSPage.html");
        }

        public function addCMSAction() {
            $CMSPageData = pagesModel::prepareCMSPageData($_POST['CMSPage']);
            if(pagesModel::isUniqueUrl($_POST['CMSPage']['urlKey'])) {
                pagesModel::insertCMSPageData($CMSPageData);
                header("location: /Admin/cms/Pages");
            } else {
                echo '<script>alert(\' Please enter unique url key\');</script>';
                View::renderTemplate("Admin/addNewCMSPage.html");
            }
        }

        public function editAction() {
            $CMSPageID = $this->route_params['id'];
            $_SESSION['CMSPageID'] = $CMSPageID;
            $CMSPageData = pagesModel::getRowDataFromDB($CMSPageID);
            View::renderTemplate("Admin/updateCMSPage.html", ['CMSPage' => $CMSPageData]);
        }

        public function editCMSPageDataAction() {
            if(isset($_POST['btnUpdateCMSPage'])) {
                $CMSPageData = pagesModel::prepareCMSPageData($_POST['CMSPage']);
                pagesModel::editCMSPage($CMSPageData, $_SESSION['CMSPageID']);
            }
            header("location: /Admin/CMS/pages");
        }

        public function DeleteAction() {
            $CMSPageID = $_GET['pageID'];
            pagesModel::deleteCMSPage($CMSPageID);
            header("location: /Admin/CMS/pages");
        }
    }
?>
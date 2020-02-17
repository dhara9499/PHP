<?php 

    namespace App\Controllers\Admin\cms;
    use Core\View;
    use Core\Controller;
    use App\Models\Admin\CMS\Pages as pagesModel;

    class Pages extends \Core\Controller {

        public function add() {
            View::renderTemplate("Admin/addNewCMSPage.html");
        }

        public function addCMS() {
            $CMSPageData = Controller::prepareData($_POST['CMSPage']);
            $CMSPageData['pageStatus'] === 'on' 
            ? $CMSPageData['pageStatus'] = 1 
            : $CMSPageData['pageStatus'] = 0 ;
            if(pagesModel::isUniqueUrl($_POST['CMSPage']['urlKey'])) {
                pagesModel::insertCMSPageData($CMSPageData);
                header("location: /Admin/cms/Pages");
            } else {
                echo '<script>alert(\' Please enter unique url key\');</script>';
                View::renderTemplate("Admin/addNewCMSPage.html");
            }
        }

        public function edit() {
            $CMSPageID = $this->route_params['id'];
            $_SESSION['CMSPageID'] = $CMSPageID;
            $CMSPageData = pagesModel::getRowDataFromDB($CMSPageID);
            View::renderTemplate("Admin/updateCMSPage.html", ['CMSPage' => $CMSPageData]);
        }

        public function editCMSPageData() {
            if(isset($_POST['btnUpdateCMSPage'])) {
                $CMSPageData = Controller::prepareData($_POST['CMSPage']);
                $CMSPageData['pageStatus'] == 'on' 
                ? $CMSPageData['pageStatus'] = 1 
                : $CMSPageData['pageStatus'] = 0;
                pagesModel::editCMSPage($CMSPageData, $_SESSION['CMSPageID']);
            }
            header("location: /Admin/CMS/pages");
        }

        public function Delete() {
            $CMSPageID = $_GET['pageID'];
            pagesModel::deleteCMSPage($CMSPageID);
            header("location: /Admin/CMS/pages");
        }
    }
?>
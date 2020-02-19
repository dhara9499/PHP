<?php 

    namespace App\Controllers\Admin;
    use Core\View;
    use Core\Controller;
    use App\Models\Admin\CMS\Pages as categoriesModel;
 

    class cms extends \Core\Controller {

        protected function before() {
            if(isset($_SESSION['userName'])) {
                return true;
            } else {
                return false;
            }
        }

        public function pagesAction() {
            $CMSPageData = categoriesModel::getDataFromDB();
            View::renderTemplate('Admin/showCMSPages.html', ['cmsPages' => $CMSPageData]);
        }
    }
?>
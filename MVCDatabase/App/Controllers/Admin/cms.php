<?php 

    namespace App\Controllers\Admin;
    use Core\View;
    use Core\Controller;
    use App\Models\Admin\CMS\Pages as categoriesModel;
 

    class cms extends \Core\Controller {

        public function pages() {
            $CMSPageData = categoriesModel::getDataFromDB();
            View::renderTemplate('Admin/showCMSPages.html', ['cmsPages' => $CMSPageData]);
        }
    }
?>
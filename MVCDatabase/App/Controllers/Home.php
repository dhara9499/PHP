<?php 
    namespace App\Controllers;
    use Core\Controller;
    use Core\View;
    use App\Models\Home as homeModels;

    class Home extends \Core\Controller{

        public function __construct() {
            $menuContentData = homeModels::getDataFromDB('cms_pages');
            $parentCategoryName = homeModels::getDataFromDB('parentCategory');
            View::renderTemplate('menu.html', ['menuLabels' => $menuContentData, 'parentcategories' => $parentCategoryName]);
        }
        
        public function home($urlKey) {
            homeModels::getRowDataFromDB($urlKey);
            $contentData = homeModels::getRowDataFromDB($urlKey);
            View::renderTemplate('Home/contentFile.html', ['contents' => $contentData]);
        }   
        
        public function hello() {
            View::renderTemplate('Home/categories.html');
        }
    }


?>
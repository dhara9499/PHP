<?php 
    namespace App\Controllers;
    use Core\Controller;
    use Core\View;
    use App\Models\Home as homeModel;

    class Home extends \Core\Controller{
        static $urlKey = null;

        public function __construct() {
            $menuContentData = homeModel::getDataFromDB('cms_pages');
            $categoryData = homeModel::getDataFromDB('categories');
            $parentCategories = homeModel::getDataFromDB('parentCategory');
            View::renderTemplate('menu.html', ['menuLabels' => $menuContentData, 'categories' => $categoryData, 'parentCategories' => $parentCategories]);
        }

        public function home($urlKey) {
            homeModel::getRowDataFromDB($urlKey);
            $contentData = homeModel::getRowDataFromDB($urlKey);
            View::renderTemplate('User/contentFile.html', ['contents' => $contentData]);
        }  
    }


?>
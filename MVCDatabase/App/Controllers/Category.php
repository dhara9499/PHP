<?php 
    namespace App\Controllers;
    use Core\Controller;
    use Core\View;
    use App\Models\Home as homeModel;
    use App\Models\Category as categoryModel;

    class Category extends \Core\Controller {

        public function __construct() {
            $menuContentData = homeModel::getDataFromDB('cms_pages');
            $categoryData = homeModel::getDataFromDB('categories');
            $parentCategories = homeModel::getDataFromDB('parentCategory');
            View::renderTemplate('menu.html', ['menuLabels' => $menuContentData, 'categories' => $categoryData, 'parentCategories' => $parentCategories]);
        }

        public function View($urlKey) {
            $productData = categoryModel::getProductData($urlKey);
            View::renderTemplate('User/categoryContent.html', ['products' => $productData]);
        }
    }



?>
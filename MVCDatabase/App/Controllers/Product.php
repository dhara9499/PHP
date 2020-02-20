<?php 
    namespace App\Controllers;
    use Core\Controller;
    use Core\View;
    use App\Models\Home as homeModel; 
    use App\Models\Product as productsModel;

    class Product extends \Core\Controller {
        public function __construct() {
            $menuContentData = homeModel::getDataFromDB('cms_pages');
            $categoryData = homeModel::getDataFromDB('categories');
            $parentCategories = homeModel::getDataFromDB('parentCategory');
            View::renderTemplate('menu.html', ['menuLabels' => $menuContentData, 'categories' => $categoryData, 'parentCategories' => $parentCategories]);
        }

        public function view($urlkey) {
            $productData = productsModel::getProductDetails($urlkey);
            View::renderTemplate('User/ProductContent.html', ['productDetail' => $productData]);
        }

    }


?>
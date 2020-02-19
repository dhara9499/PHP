<?php 

    namespace App\Controllers;
    use App\Models\Admin\Categories as categoriesModel;
    use App\Models\adminModel;
    use App\Models\Admin\Products as productsModel;

    use Core\View;

    class Admin extends \Core\Controller {
            
        public function login() {
            View::renderTemplate("adminView.html");
        }

        public function adminLogin() {
            if($_POST['btnLogin']) {
                $userName = $_POST['userName'];
                $password = $_POST['password'];
                if(adminModel::login($userName, $password)) {
                    $_SESSION['userName'] = $userName;
                    header("location:dashboard");
                } else {
                    echo '<script>alert("enter valid username and password")</script>';
                }
            }
        }

        protected function before() {
            if(isset($_SESSION['userName'])) {
                return true;
            } else {
                View::renderTemplate("adminView.html");
            }
        }


        public function dashboardAction() {
            View::renderTemplate("Admin/dashboardView.html");
        }

        public function productsAction() {
            $products = productsModel::getDataFromDB('products');
            View::renderTemplate('Admin/showProducts.html', ['products' => $products]);
        }

        public function categoriesAction() {
            $categories = categoriesModel::showCategoryData();
            View::renderTemplate('Admin/showCategories.html', ['categories' => $categories]);
        }
    }
?>
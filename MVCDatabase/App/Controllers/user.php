<?php 

    namespace App\Controllers;
    use Core\Controller;
    use Core\View;
    use App\Models\user as userModel; 
    
    class user extends \Core\Controller {

        public function login() {
            View::renderTemplate("User/login.html");
        }

        public function userLogin() {
            if(isset($_POST['btnUserLogin'])) {
                $userData = userModel::isUserExist($_POST['name'], $_POST['password']);
                $_SESSION['userID'] = $userData['userID'];
                if($userData != null) {
                    $cartData = userModel::isCartExist($userData['userID']);
                    if($cartData != null) {
                        $_SESSION['cartID'] = $cartData['cartID'];    
                    } 
                    header("location:/Home");
                } else {
                    echo 'alert(\'Enter valid name and password\')';
                    View::renderTemplate("User/login.html");
                }
            }
        }
    }


?>
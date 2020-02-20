<?php 

    namespace App\Controllers;
    use Core\Controller;
    use Core\View;
    
    class user extends \Core\Controller {

        public function login() {
            View::renderTemplate("User/login.html");
        }

        public function userLogin() {
            if(isset($_POST['btnUserLogin'])) {
                if($_POST['name'] == 'dhara' && $_POST['password'] == 'dhara') {
                    $_SESSION['userID'] = 1;
                    header("location:/Home");
                }
            }
        }
    }


?>
<?php 
    namespace App\Controllers;
    use Core\View;
    use Core\Controller;
    use App\Models\User as userModel;

    class User extends \Core\Controller {

        public function login() {
            View::renderTemplate('Users/loginView.html');
        }

        public function loginUser() {
            if(isset($_POST['btnUserLogin'])) {
                if(userModel::isUserExist($_POST['email'], $_POST['password'])) {
                    $_SESSION['userID'] = userModel::getUserID($_POST['email']);
                    header("location:dashBoard");
                } else {
                    echo "<script>alert('please enter valid userName and password')</script>";
                    View::renderTemplate('Users/loginView.html');
                }
            }
        }
        
        public function registration() {
            View::renderTemplate('Users/userRegistrationView.html');
        }

        public function registerData() {
            if(userModel::isUniqueEmail($_POST['user']['email'])) {
                $userID = userModel::insertUserData('user', $_POST['user']);
                $addressData = userModel::prepareAddressData($userID, $_POST['address']);
                userModel::insertUserData('userAddress', $addressData);
                header('location:login');
            } else {
                echo "<script>alert('please enter unique email')</script>";
                View::renderTemplate('Users/userRegistrationView.html');
            }
        }

        public function dashBoard() {
            if(isset($_SESSION['userID'])) {
                $serviceData = userModel::getServiceData($_SESSION['userID']);
                View::renderTemplate('Users/dashBoard.html', ['serviceDatas' => $serviceData]);
            } else {
                header("location: login");
            }
            
        }


    }


?>
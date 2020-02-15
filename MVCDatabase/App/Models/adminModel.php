<?php 

    namespace App\Models;
    use \Core\Model;

    class adminModel extends \Core\Model {
        public static function login($userName, $password) {
            if(Model::isUserExists($userName, $password)) {
                return true;
            } else {
                return false;
            }
        }     
    }


?>
<?php 

    namespace App\Models;
    use PDO;
    use Core\Model;

    class User extends \Core\Model {
        
        public function insertUserData($tableName, $data) {
            $userID = Model::insertData($tableName, $data);
            $db = Model::getDB();
            $userID = $db->lastInsertId();
            return $userID;
        }

        public function prepareAddressData($userID, $data) {
            $addressData = $data;
            $addressData['userID'] = $userID;
            return $addressData;
        }

        public function isUserExist($email, $password) {
            return Model::isUserExists('user', $email, $password) ? true : false;
        }

        public function isUniqueEmail($email) {
            return Model::isUnique('user', 'email', $email) ? false : true;
        }

        public function getUserID($email) {
            $userData = Model::fetchRow('user', 'email', $email);
            return $userData['userID'];
        }

        public function getServiceData($userID) {
            $db = Model::getDB();
            $stmt = $db->query("SELECT * FROM serviceregistration WHERE userID = '$userID'");
            $serviceData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $serviceData;
        }
    }



?>
<?php 
    namespace App\Models\users;
    use PDO;
    use Core\Model;
    
    class Service extends \Core\Model {

        public function prepareServiceData($userID, $data) {
            $serviceData = $data;
            $serviceData['userID'] = $userID;
            return $serviceData;
        }

        public function insertServiceData($serviceData) {
            Model::insertData('serviceregistration', $serviceData);
        }

        public function isMaxTimeSlot($timeSlot, $date) {
            $db = Model::getDB();
            $stmt = $db->query("SELECT * FROM serviceregistration WHERE timeSlot = '$timeSlot' AND date = '$date'");
            $result = $stmt->rowCount();
            return $result;
        }

        public function isUniqueVehicleNumber($vehicleNumber) {
            return Model::isUnique('serviceregistration', 'vehicleNumber', $vehicleNumber) ? false : true;
        }

        public function isUniqueLicenseNumber($licenseNumber) {
            return Model::isUnique('serviceregistration', 'licenseNumber', $licenseNumber) ? false : true;
        }
    }


?>
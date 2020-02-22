<?php 

    namespace App\Models\backend;
    use Core\Model;

    class Admin extends \Core\Model {

        public function getAllServices() {
            $services = Model::fetchAll('serviceregistration');
            return $services;
        }
        
        public function prepareEditData($data) {
            $serviceData = $data;
            $serviceData['status'] = 1 ? 'Approved' : 'Pending';
            return $serviceData;
        }

        public function isMaxTimeSlot($timeSlot, $date) {
            $db = Model::getDB();
            $stmt = $db->query("SELECT * FROM serviceregistration WHERE timeSlot = '$timeSlot' AND date = '$date'");
            $result = $stmt->rowCount();
            return $result;
        }

        public function isUniqueNumber($fieldName ,$fieldValue) {
            $db = Model::getDB();
            $stmt = $db->prepare("SELECT * FROM `serviceregistration` WHERE $fieldName = '$fieldValue'");
            $stmt->execute();
            $count = $stmt->rowCount();
            return $count == 2 ? false : true; 
        }

        public function editServiceData($serviceData, $serviceID) {
            Model::updateData('seviceregistration', $serviceData, 'serviceID', $serviceID);
        }

        public function deleteServiceData($serviceID) {
            Model::deleteData('serviceregistration', 'serviceID', $serviceID);
        }

        public function serviceRowData($serviceID) {            
            $serviceData = Model::fetchRow('serviceregistration', 'serviceID', $serviceID);
            return $serviceData;
        }
    }


?>
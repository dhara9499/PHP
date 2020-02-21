<?php 

    namespace App\Models\backend;
    use Core\Model;

    class Admin extends \Core\Model {

        public function getAllServices() {
            $services = Model::fetchAll('serviceregistration');
            return $services;
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
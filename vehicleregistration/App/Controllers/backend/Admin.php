<?php 

    namespace App\Controllers\backend;
    use Core\Controller;
    use Core\View;
    use App\Config;
    use App\Models\backend\Admin as adminModel;

    class Admin extends \Core\Controller {

        public function displayServices() {
            $serviceData = adminModel::getAllServices();
            View::renderTemplate('admin/displayServices.html', ['services' => $serviceData]);
        }

        public function edit() {
            if(isset($_SESSION['serviceID'])) {
                $service = adminModel::serviceRowData($_SESSION['serviceID']);
                View::renderTemplate('/Admin/updateServiceData.html', ['service' => $service]); 
            } else {
                $_SESSION['serviceID'] = $this->route_params['id'];
                $service = adminModel::serviceRowData($this->route_params['id']);
                View::renderTemplate('/Admin/updateServiceData.html', ['service' => $service]);
            }
        }

        public function editData() {
            if(isset($_POST['btnUpdateService'])) {
                $serviceData = adminModel::prepareEditData($_POST['service']);
                if(adminModel::isMaxTimeSlot($serviceData['timeSlot'], $serviceData['date']) < 3) {
                    if(adminModel::isUniqueNumber('vehicleNumber', $serviceData['vehicleNumber']) && adminModel::isUniqueNumber('licenseNumber', $serviceData['licenseNumber'])) {
                        adminModel::editServiceData($serviceData, $_SESSION['servieID']); 
                        header("location:displayServices");
                    } else {
                        echo '<script>alert("Please enter unique license number and vehicle number")</script>';   
                        header("location:edit"); 
                    }
                } else {
                    echo '<script>alert("this time slot already allocated to some one else")</script>';
                    header("location:edit");
                }
            }
        }

        public function delete() {
            adminModel::deleteServiceData($this->route_params['id']);
            header("location:/".Config::baseUrl."/backend/admin/displayServices");
        }


    }


?>
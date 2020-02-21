<?php 

    namespace App\Controllers\users;
    use Core\Controller;
    use Core\View;
    use App\Config;
    use App\Models\users\Service as serviceModel;

    class Service extends \Core\Controller {
    
        public function addNewService() {

            View::renderTemplate("/users/addNewService.html");
        }

        public function addServiceData() {
            if(isset($_POST['btnServiceAdd'])) {
                $serviceData = serviceModel::prepareServiceData($_SESSION['userID'], $_POST['service']); 
                if((serviceModel::isMaxTimeSlot($_POST['service']['timeSlot'], $_POST['service']['date'])) < 3) {
                    if(serviceModel::isUniqueVehicleNumber($_POST['service']['vehicleNumber']) &&  serviceModel::isUniqueLicenseNumber($_POST['service']['licenseNumber']))
                        {
                            serviceModel::insertServiceData($serviceData);
                            header("location:/".Config::baseUrl."/user/dashboard");
                        } else {
                            echo '<script>alert("Please Enter unique vehicleNumber and License number")</script>';        
                            View::renderTemplate("/users/addNewService.html");
                        }
                } else {
                    echo '<script>alert("this time slot allocated to some one else")</script>';
                    View::renderTemplate("users/addNewService.html");
                }
            }  
        }
    }


?>
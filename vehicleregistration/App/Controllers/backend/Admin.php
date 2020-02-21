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
            $service = adminModel::serviceRowData($this->route_params['id']);
            View::renderTemplate('/'.Config::baseUrl.'/admin/updateService.html', ['service' => $service]); 
        }

        public function editData() {

        }

        public function delete() {
            adminModel::deleteServiceData($this->route_params['did']);
            header("location:/".Config::baseUrl."/backend/admin/displayServices");
        }


    }


?>
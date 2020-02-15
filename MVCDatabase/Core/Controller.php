<?php 
    namespace Core;

    abstract class Controller {
        protected $route_params = [];

        public function __construct($route_params) {
            $this->route_params = $route_params;
        }

        public function prepareData($data) {
            foreach($data as $key => $value) {
                if(is_array($value)) {
                    $data[$key] = explode(',', $value);
                }
                $data[$key] = $value;
            }
            return $data;
        }
    }
?>
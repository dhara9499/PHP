<?php 

    namespace App\Controllers\Admin;
    use Core\View;
    use Core\Controller;

    class cms extends \Core\Controller {

        public function pages() {
            View::renderTemplate('Admin/showCMSPages.html');
        }

        public function add() {
            //add new cms page
            echo 'addcalled';
        }

        public function addCMSPageData() {
            //add cms data insde database
        }

        public function edit() {
            //edit cms page data
        }

        public function editCMSPageData() {
            //edit cms page data
        }

        public function deleteCMSData() {
            //delete cms page data
        }
    }
?>
<?php

namespace App\controllers;

use Core\View;

require '../Core/Controller.php';

    class Posts extends \Core\Controller
    {
        /* public function index() {
            echo 'Hello from the index action in the posts controller';

            echo '<p>Query String parameters:<pre>'.htmlspecialchars(print_r($_GET, true)). '</pre></p>';
        }

        public function addNew() {
            echo 'Hello from the addNew action in the Posts controller';
        }

        public function edit() {
            echo 'Hello from the edit action in the Posts controller';

            echo '<p>Route parameters: <pre>'. htmlspecialchars(print_r($this->route_params, true)).'</pre></p>';
        } */

        public function indexAction()
        {
            View::renderTemplate('Posts/index.html');
        }

        public function addNewAction()
        {
            echo 'Hello from the addNew action in the posts controller!';
        }

        public function editAction()
        {
            echo 'Hello from the edit action in the posts controller!';

            echo '<p>Route parameters: <pre>'.htmlspecialchars(print_r($this->route_params, true)).'</pre></p>';
        }
    }

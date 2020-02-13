<?php

namespace App\Controllers;

use Core\View;

class Home extends \Core\Controller
{
    /* public function index() {
        echo 'Hello from the index action in the Home controller';
    } */

    /* protected function before() {
        echo "(before)";
        return false;
    }

    protected function after() {
        echo "(after)";
    }

    public function indexAction() {
        echo "Hello from the index action in the Home controller!";
    } */

    protected function before()
    {
    }

    protected function after()
    {
    }

    public function indexAction()
    {
        View::renderTemplate('Home/index.html', [
                'name' => 'Dhara',
                'colours' => ['red', 'green', 'pink'],
            ]);
    }

    public function abcAction()
    {
        View::renderTemplate('Home/abc.html');
    }
}

?> 
<?php 
    session_start();

    require_once dirname(__DIR__).'/vendor/autoload.php';
    $router = new Core\Router();

    $router->add('', ['controller' => 'User', 'action' => 'login']);
    $router->add('{controller}/{action}');
    $router->add('{controller}/{action}/{id:\d+}');
    $router->add('users/{controller}/{action}', ['namespace' => 'users']);
    $router->add('users/{controller}/{action}/{id:\d+}', ['namespace' => 'users']);
    $router->add('User/cms/{controller}/{action}', ['namespace' => 'User\cms']);
    $router->add('User/cms/{controller}/{action}/{id:\d+}', ['namespace' => 'Admin\cms']);
    $url = $_SERVER['QUERY_STRING'];
    $router->dispatch($url);

    
?>
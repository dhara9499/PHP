<?php 
    session_start();

    require_once dirname(__DIR__).'/vendor/autoload.php';
    $router = new Core\Router();

    $router->add('', ['controller' => 'User', 'action' => 'login']);
    $router->add('login', ['controller' => 'User', 'action' => 'login']);
    $router->add('{controller}/{action}');
    $router->add('{controller}/{action}/{id:\d+}');
    $router->add('users/{controller}/{action}', ['namespace' => 'users']);
    $router->add('users/{controller}/{action}/{id:\d+}', ['namespace' => 'users']);
    $router->add('backend/{controller}/{action}', ['namespace' => 'backend']);
    $router->add('backend/{controller}/{action}/{id:\d+}', ['namespace' => 'backend']);
    $url = $_SERVER['QUERY_STRING'];
    $router->dispatch($url);

    
?>
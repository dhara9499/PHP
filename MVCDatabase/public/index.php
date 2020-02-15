<?php 
    session_start();
    require_once dirname(__DIR__).'/vendor/autoload.php';
    $router = new Core\Router();

    $router->add('{controller}/{action}');
    $router->add('{controller}/{action}/{id:\d+}');
    $router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
    $router->add('admin/{controller}/{action}/{id:\d+}', ['namespace' => 'Admin']);
    
    $url = $_SERVER['QUERY_STRING'];
    $router->dispatch($url);
?>
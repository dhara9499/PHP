<?php 
    session_start();

    require_once dirname(__DIR__).'/vendor/autoload.php';
    $router = new Core\Router();

    $router->add('', ['controller' => 'Home', 'action' => 'home', 'urlkey'=> 'home']);
    $router->add('{urlkey}', ['controller' => 'Home', 'action' => 'home']);
    $router->add('{controller}/{action}');
    $router->add('{controller}/{action}/{id:\d+}');
    $router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
    $router->add('admin/{controller}/{action}/{id:\d+}', ['namespace' => 'Admin']);
    $router->add('admin/cms/{controller}/{action}', ['namespace' => 'Admin\cms']);
    $router->add('admin/cms/{controller}/{action}/{id:\d+}', ['namespace' => 'Admin\cms']);
    $router->add('{controller}/{action}/{urlkey}');
    $url = $_SERVER['QUERY_STRING'];
    $router->dispatch($url);

    
?>
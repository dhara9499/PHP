<?php
    require '../App/Controllers/Posts.php';
    require '../Core/Router.php';
    require_once dirname(__DIR__).'/vendor/autoload.php';

    $router = new Router();

    $router->add('', ['controller' => 'Home', 'action' => 'index']);
    // $router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
    // $router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
    $router->add('{controller}/{action}');
    $router->add('{controller}/{id:\d+}/{action}');
    $router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

    // display the routing table
    echo '<pre>';
    echo htmlspecialchars(print_r($router->getRoutes(), true));
    echo '</pre>';
    //Match the requested route

    $router->dispatch($_SERVER['QUERY_STRING']);
    $url = $_SERVER['QUERY_STRING'];

    // if ($router->match($url)) {
    //     echo '<pre>';
    //     var_dump($router->getParams());
    //     echo '</pre>';
    // } else {
    //     echo 'No route found for url = '.$url;
    // }

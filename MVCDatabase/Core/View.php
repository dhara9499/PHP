<?php 
    namespace Core;
    use App\Config;
    class View
    {
        public static function renderTemplate($template, $args = [])
        {
            static $twig = null;
    
            if ($twig === null) {
                $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
                $twig = new \Twig\Environment($loader);
                $twig->addGlobal('baseUrl', Config::baseUrl);
            }
            echo $twig->render($template, $args);
        }
    }

?>
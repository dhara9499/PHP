<?php
    $serverName = $_SERVER['SERVER_NAME'];
    $userName = 'root';
    $password = '';
    $dbName = 'phptest';

    $connectionObject = mysqli_connect($serverName, $userName, $password, $dbName)
    or 
    die('Couldn\'t connect to the database');
?>
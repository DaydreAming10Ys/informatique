<?php
    require './includes/flight-master/flight/Flight.php';
    require './includes/smarty-3.1.35/libs/Smarty.class.php';
    require './includes/pdo.php';
    require './routes.php';

    Flight::set('db', $db); //$db = new PDO(...) from file PDO.php

    Flight::register('view', 'Smarty', array(), function($smarty){
        $smarty->template_dir = './templates/';
        $smarty->compile_dir = './templates_c/';
        $smarty->config_dir = './config/';
        $smarty->cache_dir = './cache/';
    });
    
    Flight::map('render', function($template, $data){
        Flight::view()->assign($data);
        Flight::view()->display($template);    
    });

    Flight::start();

?>
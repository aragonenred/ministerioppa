<?php
    require_once "config/config.php";
    require_once "core/routes.php";
    require_once "config/database.php";
    /*require_once "controllers/ItemsController.php";

    if(!is_file('controllers/CupboardController.php')){
        echo "lo encontre ";
    }*/

    if(isset($_GET['c'])){
        $controller = loadController($_GET['c']); //Lo va a buscar a routes.php

        if(isset($_GET['a'])){
            loadAction($controller, $_GET['a']);
        }else{
            loadAction($controller, DEFAULT_ACTION);
        }
        
    }else{
        $default = DEFAULT_CONTROLLER;
        $controller = loadController(DEFAULT_CONTROLLER);
        loadAction($controller, DEFAULT_ACTION);
    }



?>
<?php

    function loadController($controller){
        $nameController = $controller."Controller";
        $fileController = "controllers/".$controller."Controller".".php";

        if(!is_file($fileController)){
            echo "no existe:  " .$fileController;
            echo "</br>";
         //   $nameController = DEFAULT_CONTROLLER."Controller";
           // $fileController = "controllers/".DEFAULT_CONTROLLER."Controller".".php";
            echo $fileController;
        }
        require_once $fileController;
        $control = new $nameController();
        return $control;
    }

    function loadAction($controller, $action){

        if(isset($action) && method_exists($controller, $action)){
            $controller->$action();
        }else{
            $action = DEFAULT_ACTION;
            echo $action;
            echo $controller;
            $controller->$action();
        }
    }



?>
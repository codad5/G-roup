<?php
    spl_autoload_register("myAutoLoader");
    function myAutoLoader($classname){
        $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if(strpos($url, 'inc') !== false){
            $path = "../classes/";
        }
        elseif(strpos($url, 'api') !== false){
            $path = "../classes/";

        }
        else{
            $path = "classes/";

        }
        $extension = ".class.php";
        require_once $path.$classname.$extension;
    }
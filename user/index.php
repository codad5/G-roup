<?php

    session_start();
    if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
          header('location:login.php');
    }

   require_once 'imc/class_autoloader.inc.php';
   require_once 'imc/function.inc.php';

   $user = new
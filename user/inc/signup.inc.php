<?php
    if(!isset($_POST['submit_signup'])){
        header("location: ../login.php");
        exit;
    }
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if(empty($username) || empty($password) || empty($email)){
        header("location:../login.php?error=emptyinput&username=".empty($username)."&password=".empty($password)."&email=".empty($email));
        exit;
    }
    if($email == false){
        header("location:../login.php?error=invalidEmail");
    }
   require_once 'class_autoloader.inc.php';
   require_once 'function.inc.php';
   $otp = get_otp();
   $newUser = new NewUser($username, $email, $password, $otp);
   $signUp = new NewObject($newUser);
   
   if($signUp->Create($newUser) === true){
       echo "Done";
       session_start();
       $_SESSION['username'] = $username;
       $_SESSION['email'] = $email;
       header('location:../');

   }else{
       var_dump($signUp->Create($newUser));
   }


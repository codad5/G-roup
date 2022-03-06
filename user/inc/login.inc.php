<?php


    if(!isset($_POST['submit'])){
        header("location: ../login.php");
        exit;
    }
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if(empty($username) || empty($password)){
        header("location:../login.php?error=emptyinput&username=".empty($username)."&password=".empty($password));
        exit;
    }

    require_once 'class_autoloader.inc.php';
   require_once 'function.inc.php';


   $login = new Dbh;
   $logging = $login->checkUser($username, $username);

   if($logging === true){
       header("location: ../login.php?error=userdontexist");
       exit;
   }
   else {
       
    $loginData = $logging[0];
    var_dump($loginData);

    $hashed_pwd = $loginData['user_password'];
    if(password_verify($password, $hashed_pwd) === false){
        header("location: ../login.php?error=wrongpassword");
       exit;
    }
    else{
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $loginData['user_email'];
        header('location:../');
    }
   }

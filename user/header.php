<?php
    if($_SERVER['SCRIPT_FILENAME'] === dirname($_SERVER['SCRIPT_FILENAME'])."/header.php"){
        header("location:index.php");

    }
    session_start();
   require_once 'inc/class_autoloader.inc.php';
   require_once 'inc/function.inc.php';
    if(!isset($_SESSION['username']) || !isset($_SESSION['email'])){
            
          logout();
          exit;
    }

 

   $user = new User($_SESSION['username'], $_SESSION['email']);
   $user_name = $user->user_name;
   $user_email = $user->user_email;
   $_SESSION['email'] = $user_email;
   $_SESSION['username'] = $user_name;

   ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
       <title>Document</title>
       
       <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap/dist/carousel.css">
        <link rel="stylesheet" href="../bootstrap/dist/carousel.rtl.css">
        <link rel="stylesheet" href="../css/animations.css">
        <link rel="stylesheet" href="../css/animate.min.css">
        <link rel="stylesheet" href="../css/user.css"> 
        <link rel="stylesheet" href="../css/master.css"> 
       <script src="../scripts/jquery-3.6.0.min.js"></script>
   </head>
   <body>
        
       <main>
           <div class="notifications-box-cnt">
        </div>
       <script>
      
      const notificationbox = document.querySelector('.notifications-box-cnt');
      const notification_close_btn = document.querySelectorAll('.noti-btn-close');
      const notificationAdd = (message, noti_type = 'alert-info') => {
        const new_notification = document.createElement("div");
        const notification_close_btn = document.createElement("button");
        new_notification.className = `alert alert-dismissible fade show ${noti_type} animate__animated animate__backInRight`;
        notification_close_btn.className = `btn-close noti-btn-close`;
        notification_close_btn.dataset.bsDismiss = `alert`;
        let node = document.createTextNode(message);
        new_notification.appendChild(node);
        
        new_notification.appendChild(node);
        new_notification.appendChild(notification_close_btn);

        
        notificationbox.appendChild(new_notification);
        setTimeout(() => {

                new_notification.classList.remove('animate__backInRight');
                new_notification.classList.add('animate__backOutRight');
                
                
            
        }, 3000);
        setTimeout(() => {

                
                new_notification.remove();
                
            
        }, 3800);
      }
    //   Array.prototype.forEach.call(notification_close_btn, elem => {
    //     setTimeout(() => {
    //       elem.click();
    //       console.log('hello');
    //     }, 2000)
    //   });
    </script>

      
       
   
   <?php

   if($user->verified() != true){
       $user->send_otp();
       

       //    header('Location:verify.php');
    ?>
    <div class="verify_modal">
        <div class="verify-wrapper">
            <h3>Verify Email Address</h3>
            <form action="" method="post" id="verify-form">
                <input type="text" placeholder="Verification Code" id="verify-code" name="ver-code">
                <input type="submit" value="verify" id="submit-code" name="verify">
            </form>
            <button>resend code</button>
            <div class="errormsg" styl="display:none;">
                
            </div>
        </div>
        
    </div>
    <script>
        $(document).ready(function () {
        // $("#login-signup").submit(function (event) {
            let verifyCode = document.querySelector('#verify-code');
            let submit = document.querySelector('#submit-code');
            let form = document.querySelector('#verify-form');
            let Code = verifyCode.value;
            verifyCode.addEventListener('input', () => {
                Code = verifyCode.value;
                if(Code.length >= 6){

                    $(".errormsg").load("inc/verify.inc.php", {
                    Code: Code
                    
                    
                    });
                }
            // console.log(1);
             });
            $('#verify-form').submit((event) => {
                Code = verifyCode.value;
                event.preventDefault();  

                $('.errormsg').load("inc/verify.inc.php", {
                    Code: Code
                })

            })
            submit.addEventListener('click', () => {
                Code = verifyCode.value;
            
                $(".errormsg").load("inc/verify.inc.php", {
                    Code: Code
                    

                });
            // console.log(1);
        });
        
    });
    </script>
    <?php
    exit;
   }
  

   ?>
    <header class="nav-header">

    </header>
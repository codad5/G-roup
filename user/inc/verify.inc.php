<?php
session_start();
if(isset($_POST['Code'])){
    $code = filter_var($_POST['Code'], FILTER_SANITIZE_STRING);
    require_once 'class_autoloader.inc.php';
    require_once 'function.inc.php';
    $user = new User($_SESSION['username'], $_SESSION['email']);
    $user_name = $user->user_name;
    $user_email = $user->user_email;
    $userProfile = $user->getUserProfile();
    

    if (strlen($code) >=6 ) {
        $retVal = ($code === $userProfile['otp']) ? $user->verify() : false ;
        echo $retVal;
        
        switch ($retVal) {
            case true:
                # code...
                echo "<script>
                        notificationAdd('Account Verified ', 'alert-success');
                        
                        setTimeout(() => {
                            window.reload();
                            
                        },3000);
                     </script>";
                break;
            
            default:
                echo "<script>
                            notificationAdd(' Verification Failed ', 'alert-warning');
                            
                            
                        </script>";
                # code...
                break;
        }
        
        # code...
    }

}


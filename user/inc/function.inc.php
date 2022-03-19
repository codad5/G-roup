<?php
    function get_otp(){
                 $digit = [0, 1, 2, 3, 4,5,6,7,8,9];
                 $otp = "";
                 for ($i = 0; $i < 6; $i++) {
                     $otp.=$digit[floor(rand(0, 9))];

                     # code...
                 }
                 
                 return $otp;

            }
    function logout(){
        if(!isset($_SESSION)) {
            session_start();

        }
        session_unset();
        session_destroy();
        $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        if(strpos($url, 'inc') !== false){
            header("location: login.php?error=logout");

        }
        
        exit;

        
    }
    function apiExit($api){
        if(isset($api['datasent']['password'])){
            $api['datasent']['password'] = md5($api['datasent']['password']);
            // for($i = 0; $i < strlen($api['datasent']['password']); $i++){
                
            //     $api['datasent']['password'] = $api['datasent']['password']."*";
            }
        
        echo json_encode($api);
        exit;
    }
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
?>
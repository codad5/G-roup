<?php 
    class User extends Dbh
    {
        public $user_name;
        public $user_email;
        public $verify;

        public function __construct($userName = "", $userEmail = ""){
            
            $this->user_name = $userName;
            $this->user_email = $userEmail;
            if($this->checkUser($this->user_name, $this->user_email) === true){
                $this->logout();
                
                header("Location:".$_SERVER["SCRIPT_URI"]."/user/login.php");
                exit;

                


            }
            
        }

        public function getUserProfile(){
            $details =  $this->CheckUser($this->user_name, $this->user_email);
            if($details !== true){
                return $details[0];
            }
            else{
                return false;
            }
        }

        public function verified(){
            $this->verify = $this->checkUser($this->user_name, $this->user_email)[0]['user_active'];
            return $this->verify;
        }

        public function verify(){
            $sql = "UPDATE users SET user_active = ? WHERE user_name = ? AND user_email = ?;";
            $stmt = $this->connect()->prepare($sql);
            if(!$stmt->execute(array(true, $this->user_name, $this->user_email))){
                return false;
                 
            }
            else{
                return true;
            }
        }

        public function send_otp(){

        }
        public function logout(){
            session_unset();
            session_destroy();
            exit;

        }

        
        
    }
    
?>
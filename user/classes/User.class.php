<?php 
    class User extends Dbh
    {
        public $user_name;
        public $user_email;

        public function __construct($userName = "", $userEmail = ""){
            $this->user_name = $userName;
            $this->user_email = $userEmail;
            if($this->checkUser($this->name, $this->email) !== true){
                
                throw new Exception("User details already exist");
                exit;

                


            }
        }
        
    }
    
?>
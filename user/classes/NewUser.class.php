<?php
    Class NewUser extends Dbh implements NewItem {
        protected $name;
        protected $password;
        protected $email;
        protected $otp;
        public function __construct($name, $email, $password, $otp){
            new Dbh;
            $this->name = $name;
            $this->password = password_hash($password, true);
            $this->email = $email;
            $this->otp = $otp;

        }
        public function newObject(){
            return $this->setUser();

        }
        public function setUser(){
            $m = $this->checkUser($this->name, $this->email);
            if($this->checkUser($this->name, $this->email) !== true){
                
                throw new Exception("User details already exist");
                exit;

                


            }
            

            $stmt = $this->connect()->prepare("INSERT INTO users ( user_name, user_email, user_password, otp) VALUES  (?, ?,?,?);");
            if(!$stmt->execute(array($this->name, $this->email, $this->password, $this->otp))){
                $stmt = null;
                throw new Exception('Stmt Failed', 1);
                exit();

                }
                // return $stmt->rowCount();
                

                    return  true; 
                    throw new Exception("Done");
                    #$stmt->rowCount();
                
            

            }
            public function get_otp(){
                 $digit = [0, 1, 2, 3, 4,5,6,7,8,9];
                 $otp = "";
                 for ($i = 0; $i < 6; $i++) {
                     $otp.=$digit[floor(rand(0, 9))];

                     # code...
                 }
                 $this->otp = $otp;
                 return $otp;

            }

            public function send_otp(){
                return $this->otp;
            }
            
    }
<?php
    
    Class NewGroup extends Dbh implements NewItem{
        public function newObject(){
            
        }
        
    }
    
    Class NewObject {

        public function __construct(){
        }
        public function Create(NewItem $newItam){
            try{

                if($newItam->newObject() === true){
                    return true;
                }
                else{
                    throw new Exception('An Error occured');
                }
                
            }
            catch (Exception $e){
                return ['message' => $e->getMessage(), false];
            }
            

        }
    }


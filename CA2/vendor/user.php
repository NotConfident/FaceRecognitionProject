<?php
require __DIR__.'/vendor/autoload.php';
require "index.php";

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class User{
    protected $database;
    protected $dbname = 'IT01';

    public function __construct(){
        $acc - ServiceAccount::fromJsonFile(__DIR__.'/Firebase/studentdetails-99fa7-b8c8c028db78.json');
        $firebase = (new Factory) -> withServiceAccount($acc)->create();

        $this->database = $firebase->getDatabase();
    }

    public function get(int $userID = NULL){
        if(empty($userID) || !isset($userID)){
            return FALSE;
        }

        if($this->$database->getReference($this->dbname)->getSnapshot()->getChild($userID)){
            return $this->database->getReference($this->dbname)->getChild($userID)->getValue();
        }  
        else{
            return FALSE;
        } 
    }
}

$users = new User();

var_dump($users->get("0xcb28549225L"));
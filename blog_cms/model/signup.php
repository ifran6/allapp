<?php
class Signup extends Dbh{
private $username;
private $pwd;

    public __construct($username, $pwd)
    {
        $this->username = $username;
        $this->pwd = $pwd;
    }


    private function insertUser(){
     $query = "INSERT INTO user_tab('username', 'password')VALUES(:username, :pwd);";
     $stmt = $this->connect()->prepare($query);
     $stmt->bind_param(":username", $this->username);
     $stmt->bind_param(":pwd", $this->username);
     $stmt->excute();
    }

    private function isEmptySubmit(){
        if(isset($this->username) && isset($this->pwd)){
            return false;
        }else{
            return true;
        }
    }

    private function signupUser(){

    }
}
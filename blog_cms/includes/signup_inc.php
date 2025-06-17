<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

     require_once('../model/Dbh.php');
     require_once('../model/signup.php');
     
    $signup = new Signup($username, $password)
}
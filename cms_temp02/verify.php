<?php require 'User.php'; 
$user = new User(); 
if (isset($_GET['email'], $_GET['token'])) { 
    $user->verifyUser($_GET['email'], $_GET['token']); 
    } ?>
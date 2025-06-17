<?php require 'User.php'; 
session_start(); 
$user = new User(); 
if (isset($_SESSION['user_id'])) { 
    $user->deleteUser($_SESSION['user_id']);
     session_destroy(); } ?>
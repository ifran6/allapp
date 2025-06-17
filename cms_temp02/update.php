<?php require 'User.php'; 
session_start();
$user = new User(); 
if (isset($_SESSION['user_id'])) { 
    $user->updateUser($_SESSION['user_id'], $_POST['username'], $_POST['email']); 
} ?>
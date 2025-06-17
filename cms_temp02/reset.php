<?php require 'User.php'; 
$user = new User(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
$user->resetPassword(
    $_POST['email'], 
    $_POST['token'], 
    $_POST['password']
); 
} ?>
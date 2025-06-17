<?php require 'User.php'; 
$user = new User(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $user->sendResetLink($_POST['email']); 
    } ?>
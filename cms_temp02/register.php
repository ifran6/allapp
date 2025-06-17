<?php require 'User.php'; 
$user = new User(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $user->register($_POST['username'], $_POST['email'], $_POST['password']);
 } 
    ?>
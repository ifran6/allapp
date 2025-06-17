<?php require 'User.php'; 
session_start(); 
$user = new User(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $uid = $user->login($_POST['email'], 
    $_POST['password']); 
    if ($uid) { $_SESSION['user_id'] = $uid; 
    if (isset($_POST['remember'])) { 
        setcookie('user_id', $uid, time()+86400*30); 
     } 
 } 
} ?>
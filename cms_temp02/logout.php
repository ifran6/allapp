<?php 
session_start(); 
session_destroy(); 
setcookie('user_id', '', time() - 3600); 
echo 'Logged out.'; 
?>